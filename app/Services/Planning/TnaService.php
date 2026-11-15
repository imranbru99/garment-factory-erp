<?php

declare(strict_types=1);

namespace App\Services\Planning;

use App\Models\BuyerOrder;
use App\Models\Holiday;
use App\Models\TnaMilestone;
use App\Models\TnaTemplateTask;
use Carbon\CarbonInterface;
use Illuminate\Support\Carbon;

class TnaService
{
    /**
     * Walk backward from the ship date by the given number of factory working days.
     *
     * @param  list<string>  $holidays  Y-m-d
     */
    public function dueDate(CarbonInterface $shipOn, int $workingDaysBefore, array $holidays = []): CarbonInterface
    {
        $cursor = Carbon::parse($shipOn->toDateString())->startOfDay();
        $remaining = max(0, $workingDaysBefore);
        $guard = 0;
        while ($remaining > 0 && $guard < 400) {
            $cursor = $cursor->subDay();
            $guard++;
            if ($this->isClosed($cursor, $holidays)) {
                continue;
            }
            $remaining--;
        }

        return $cursor;
    }

    public function buildForOrder(BuyerOrder $order): int
    {
        if (TnaMilestone::query()->where('buyer_order_id', $order->id)->exists()) {
            return 0;
        }

        $ship = $order->ship_on ? Carbon::parse($order->ship_on) : now()->addDays(45);
        $holidays = Holiday::query()->whereNotNull('holiday_on')->pluck('holiday_on')->map(fn ($date) => Carbon::parse($date)->toDateString())->all();
        $tasks = TnaTemplateTask::query()->orderBy('sort_order')->get();
        if ($tasks->isEmpty()) {
            $tasks = collect([
                ['name' => 'Fabric in-house', 'offset_days' => 21],
                ['name' => 'Trims in-house', 'offset_days' => 14],
                ['name' => 'Cutting', 'offset_days' => 10],
                ['name' => 'Sewing', 'offset_days' => 7],
                ['name' => 'Finishing', 'offset_days' => 3],
                ['name' => 'Ex-factory', 'offset_days' => 1],
            ]);
        }

        $count = 0;
        foreach ($tasks as $index => $task) {
            $offset = (int) (is_array($task) ? $task['offset_days'] : $task->offset_days);
            $name = is_array($task) ? $task['name'] : (string) $task->name;
            $due = $this->dueDate($ship, $offset, $holidays);
            TnaMilestone::query()->create([
                'name' => $name,
                'buyer_order_id' => $order->id,
                'unit_id' => $order->unit_id,
                'tna_template_task_id' => $task instanceof TnaTemplateTask ? $task->id : null,
                'due_on' => $due->toDateString(),
                'status' => $due->isPast() ? 'delayed' : 'pending',
                'owner_id' => $order->merchandiser_id,
                'sort_order' => $index + 1,
            ]);
            $count++;
        }

        return $count;
    }

    /** @param  list<string>  $holidays */
    private function isClosed(CarbonInterface $day, array $holidays): bool
    {
        $weekends = config('garment.weekend_days', [5]);

        return in_array((int) $day->dayOfWeekIso, $weekends, true)
            || in_array($day->toDateString(), $holidays, true);
    }
}
