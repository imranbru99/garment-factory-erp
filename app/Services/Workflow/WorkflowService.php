<?php

declare(strict_types=1);

namespace App\Services\Workflow;

use App\Events\OrderConfirmed;
use App\Models\BuyerOrder;
use App\Models\User;
use App\Services\Numbering\NumberingService;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class WorkflowService
{
    public function transition(Model $record, string $target, ?User $actor = null): Model
    {
        $current = (string) $record->getAttribute('status');
        $allowed = config('workflows.'.$record->getTable().'.'.$current, []);
        if (! is_array($allowed) || ! in_array($target, $allowed, true)) {
            throw new InvalidArgumentException("Cannot move {$record->getTable()} from {$current} to {$target}.");
        }

        $record->setAttribute('status', $target);
        if ($record instanceof BuyerOrder && $target === 'confirmed') {
            $record->confirmed_at = now()->toDateTimeString();
            if (blank($record->po_number)) {
                $record->po_number = app(NumberingService::class)->next('buyer_order', $record->unit_id, 'PO');
            }
        }
        $record->save();

        if ($record instanceof BuyerOrder && $target === 'confirmed') {
            event(new OrderConfirmed($record));
        }

        return $record;
    }
}
