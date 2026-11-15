<?php

declare(strict_types=1);

namespace App\Services\Issues;

use App\Models\Capa;
use App\Models\Certificate;
use App\Models\HourlyProduction;
use App\Models\Issue;
use App\Models\IssueComment;
use App\Models\IssueTask;
use App\Models\IssueType;
use App\Models\Item;
use App\Models\LetterOfCredit;
use App\Models\Playbook;
use App\Models\PlaybookStep;
use App\Models\StockBalance;
use App\Models\TnaMilestone;
use App\Services\Notifications\Notifier;
use Illuminate\Support\Carbon;

class IssueEngine
{
    public function __construct(private readonly Notifier $notifier) {}

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function raise(array $attributes): Issue
    {
        $type = IssueType::query()->findOrFail($attributes['issue_type_id']);
        $severity = (string) ($attributes['severity'] ?? $type->severity_default ?? 'medium');
        $hours = $this->slaHours($severity, (int) $type->sla_hours);

        $issue = Issue::query()->create([
            'name' => (string) ($attributes['name'] ?? $type->name),
            'name_bn' => $attributes['name_bn'] ?? $type->name_bn,
            'issue_type_id' => $type->id,
            'severity' => $severity,
            'status' => 'detected',
            'owner_id' => $attributes['owner_id'] ?? null,
            'reporter_id' => $attributes['reporter_id'] ?? null,
            'buyer_order_id' => $attributes['buyer_order_id'] ?? null,
            'line_id' => $attributes['line_id'] ?? null,
            'unit_id' => $attributes['unit_id'] ?? null,
            'description' => $attributes['description'] ?? null,
            'sla_due_at' => now()->addHours($hours),
            'impact_days' => $attributes['impact_days'] ?? 0,
            'impact_cost_minor' => $attributes['impact_cost_minor'] ?? 0,
            'root_cause' => $attributes['root_cause'] ?? null,
            'linked_type' => $attributes['linked_type'] ?? null,
            'linked_id' => $attributes['linked_id'] ?? null,
            'recurrence_count' => 0,
        ]);

        $playbook = Playbook::query()->where('issue_type_id', $type->id)->first();
        if ($playbook instanceof Playbook) {
            $steps = PlaybookStep::query()->where('playbook_id', $playbook->id)->orderBy('sort_order')->get();
            foreach ($steps as $step) {
                IssueTask::query()->create([
                    'name' => $step->name,
                    'issue_id' => $issue->id,
                    'playbook_step_id' => $step->id,
                    'status' => 'open',
                    'due_on' => now()->addDay()->toDateString(),
                    'assignee_id' => $issue->owner_id,
                ]);
            }
        }

        $this->markRecurrence($issue);

        return $issue->fresh() ?? $issue;
    }

    public function escalate(): int
    {
        $count = 0;
        $due = Issue::query()
            ->whereIn('status', ['detected', 'assigned'])
            ->whereNotNull('sla_due_at')
            ->where('sla_due_at', '<', now())
            ->get();

        foreach ($due as $issue) {
            $issue->status = 'assigned';
            $issue->save();
            IssueComment::query()->create([
                'name' => 'Escalation',
                'issue_id' => $issue->id,
                'body' => 'SLA breached. Escalated from owner to department head, then GM.',
            ]);
            $this->notifier->send('email', 'gm@padma.test', 'Issue SLA breached: '.$issue->name, 'en', $issue->unit_id);
            $count++;
        }

        return $count;
    }

    public function scan(): int
    {
        $created = 0;
        $created += $this->scanLateMilestones();
        $created += $this->scanLcExpiry();
        $created += $this->scanCertificates();
        $created += $this->scanEfficiency();
        $created += $this->scanReorder();

        return $created;
    }

    private function scanLateMilestones(): int
    {
        $type = $this->type('tna_delay', 'high', 24, 'orders');
        $count = 0;
        $rows = TnaMilestone::query()->whereIn('status', ['pending', 'delayed'])->whereDate('due_on', '<', now()->toDateString())->get();
        foreach ($rows as $row) {
            if ($row->status === 'pending') {
                $row->status = 'delayed';
                $row->save();
            }
            $count += $this->openOnce($type, TnaMilestone::class, (int) $row->id, [
                'name' => 'TNA delayed: '.$row->name,
                'buyer_order_id' => $row->buyer_order_id,
                'unit_id' => $row->unit_id,
                'description' => 'Milestone due '.$row->due_on,
                'root_cause' => 'Method',
            ]);
        }

        return $count;
    }

    private function scanLcExpiry(): int
    {
        $type = $this->type('lc_expiry', 'critical', 4, 'commercial');
        $count = 0;
        $rows = LetterOfCredit::query()
            ->whereIn('status', ['opened', 'amended'])
            ->whereNotNull('expiry_on')
            ->whereDate('expiry_on', '<=', now()->addDays(15)->toDateString())
            ->get();
        foreach ($rows as $row) {
            $count += $this->openOnce($type, LetterOfCredit::class, (int) $row->id, [
                'name' => 'LC nearing expiry: '.$row->lc_number,
                'buyer_order_id' => $row->buyer_order_id,
                'unit_id' => $row->unit_id,
                'description' => 'Expires '.$row->expiry_on,
                'severity' => 'critical',
            ]);
        }

        return $count;
    }

    private function scanCertificates(): int
    {
        $type = $this->type('certificate_expiry', 'high', 48, 'compliance');
        $count = 0;
        $rows = Certificate::query()->whereNotNull('expires_on')->whereDate('expires_on', '<=', now()->addDays(30)->toDateString())->get();
        foreach ($rows as $row) {
            $count += $this->openOnce($type, Certificate::class, (int) $row->id, [
                'name' => 'Certificate expiring: '.$row->name,
                'unit_id' => $row->unit_id,
                'description' => 'Expires '.$row->expires_on,
            ]);
        }

        return $count;
    }

    private function scanEfficiency(): int
    {
        $type = $this->type('low_efficiency', 'medium', 8, 'sewing');
        $threshold = (float) config('garment.efficiency_alert', 50);
        $count = 0;
        $rows = HourlyProduction::query()->whereDate('produced_on', now()->toDateString())->where('efficiency', '<', $threshold)->get();
        foreach ($rows as $row) {
            $count += $this->openOnce($type, HourlyProduction::class, (int) $row->id, [
                'name' => 'Line below target',
                'line_id' => $row->line_id,
                'buyer_order_id' => $row->buyer_order_id,
                'unit_id' => $row->unit_id,
                'description' => 'Efficiency '.$row->efficiency,
                'root_cause' => 'Man',
            ]);
        }

        return $count;
    }

    private function scanReorder(): int
    {
        $type = $this->type('below_reorder', 'medium', 24, 'inventory');
        $count = 0;
        $items = Item::query()->where('reorder_level', '>', 0)->get();
        foreach ($items as $item) {
            $qty = (string) StockBalance::query()->where('item_id', $item->id)->sum('qty');
            if (bccomp($qty, (string) $item->reorder_level, 4) < 0) {
                $count += $this->openOnce($type, Item::class, (int) $item->id, [
                    'name' => 'Below reorder: '.$item->name,
                    'unit_id' => $item->unit_id,
                    'description' => 'On hand '.$qty.' reorder '.$item->reorder_level,
                    'root_cause' => 'Material',
                ]);
            }
        }

        return $count;
    }

    /** @param  array<string, mixed>  $attributes */
    private function openOnce(IssueType $type, string $linkedType, int $linkedId, array $attributes): int
    {
        $exists = Issue::query()
            ->where('issue_type_id', $type->id)
            ->where('linked_type', $linkedType)
            ->where('linked_id', $linkedId)
            ->where('status', '!=', 'closed')
            ->exists();
        if ($exists) {
            return 0;
        }

        $this->raise($attributes + [
            'issue_type_id' => $type->id,
            'linked_type' => $linkedType,
            'linked_id' => $linkedId,
        ]);

        return 1;
    }

    private function type(string $code, string $severity, int $slaHours, string $module): IssueType
    {
        return IssueType::query()->firstOrCreate(
            ['code' => $code],
            [
                'name' => str_replace('_', ' ', $code),
                'severity_default' => $severity,
                'sla_hours' => $slaHours,
                'module' => $module,
            ],
        );
    }

    private function slaHours(string $severity, int $fallback): int
    {
        return match ($severity) {
            'critical' => 4,
            'high' => 24,
            'medium' => 72,
            'low' => 168,
            default => max(1, $fallback),
        };
    }

    private function markRecurrence(Issue $issue): void
    {
        if (blank($issue->root_cause)) {
            return;
        }

        $count = Issue::query()
            ->where('issue_type_id', $issue->issue_type_id)
            ->where('root_cause', $issue->root_cause)
            ->count();
        $issue->recurrence_count = $count;
        $issue->save();

        if ($count < 3) {
            return;
        }

        $already = Capa::query()->where('source_type', Issue::class)->where('root_cause', $issue->root_cause)->exists();
        if ($already) {
            return;
        }

        Capa::query()->create([
            'name' => 'Permanent fix: '.$issue->root_cause,
            'source_type' => Issue::class,
            'source_id' => $issue->id,
            'status' => 'open',
            'due_on' => Carbon::now()->addDays(7)->toDateString(),
            'owner_id' => $issue->owner_id,
            'root_cause' => $issue->root_cause,
            'action' => 'Recurring issue. Assign a manager-owned permanent corrective action.',
            'unit_id' => $issue->unit_id,
        ]);
    }
}
