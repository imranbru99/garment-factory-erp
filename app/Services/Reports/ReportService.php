<?php

declare(strict_types=1);

namespace App\Services\Reports;

use App\Models\BuyerOrder;
use App\Models\Certificate;
use App\Models\HourlyProduction;
use App\Models\Issue;
use App\Models\LetterOfCredit;
use App\Services\Ai\FactoryAi;
use App\Services\Notifications\Notifier;
use Illuminate\Support\Facades\DB;

class ReportService
{
    public function __construct(
        private readonly Notifier $notifier,
        private readonly FactoryAi $ai,
    ) {}

    /** @return array<string, int|string> */
    public function snapshot(): array
    {
        $openOrders = BuyerOrder::query()->whereNotIn('status', ['closed', 'cancelled'])->count();
        $openIssues = Issue::query()->where('status', '!=', 'closed')->count();
        $lateTna = DB::table('tna_milestones')->where('status', 'delayed')->whereNull('deleted_at')->count();
        $expiringCertificates = Certificate::query()->whereDate('expires_on', '<=', now()->addDays(30))->count();
        $expiringLcs = LetterOfCredit::query()->whereIn('status', ['opened', 'amended'])->whereDate('expiry_on', '<=', now()->addDays(30))->count();
        $output = (int) HourlyProduction::query()->whereDate('produced_on', now()->subDay()->toDateString())->sum('actual_qty');

        return [
            'open_orders' => $openOrders,
            'open_issues' => $openIssues,
            'delayed_milestones' => $lateTna,
            'expiring_certificates' => $expiringCertificates,
            'expiring_lcs' => $expiringLcs,
            'yesterday_output' => $output,
        ];
    }

    public function morningText(): string
    {
        $snapshot = $this->snapshot();
        $lines = [
            'Padma Apparel morning report',
            'Open orders: '.$snapshot['open_orders'],
            'Open issues: '.$snapshot['open_issues'],
            'Delayed TNA milestones: '.$snapshot['delayed_milestones'],
            'Certificates expiring in 30 days: '.$snapshot['expiring_certificates'],
            'LCs expiring in 30 days: '.$snapshot['expiring_lcs'],
            'Yesterday sewing output: '.$snapshot['yesterday_output'],
        ];
        $text = implode("\n", $lines);
        $ai = $this->ai->morningSummary($text);

        return $ai ? $text."\n\n".$ai : $text;
    }

    public function dispatchMorning(): void
    {
        $body = $this->morningText();
        $this->notifier->send('email', 'gm@padma.test', $body, 'en');
        $this->notifier->send('whatsapp', 'gm', $body, 'bn');
    }
}
