<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Models\StockBalance;
use App\Models\StockLayer;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class StockService
{
    public function receive(int $storeId, int $itemId, string $qty, int $unitCostMinor, ?int $buyerOrderId = null, ?int $unitId = null): StockMovement
    {
        return DB::transaction(function () use ($storeId, $itemId, $qty, $unitCostMinor, $buyerOrderId, $unitId): StockMovement {
            $balance = $this->balance($storeId, $itemId);
            $next = bcadd((string) $balance->qty, $qty, 4);
            $balance->qty = (float) $next;
            $balance->value_minor = (int) $balance->value_minor + (int) round((float) $qty * $unitCostMinor);
            $balance->save();

            StockLayer::query()->create([
                'name' => 'Layer '.$itemId,
                'store_id' => $storeId,
                'item_id' => $itemId,
                'qty_remaining' => $qty,
                'unit_cost_minor' => $unitCostMinor,
                'received_at' => now(),
            ]);

            return $this->movement($storeId, $itemId, 'in', $qty, $unitCostMinor, $next, $buyerOrderId, $unitId);
        });
    }

    public function issue(int $storeId, int $itemId, string $qty, ?int $buyerOrderId = null, ?int $unitId = null): StockMovement
    {
        return DB::transaction(function () use ($storeId, $itemId, $qty, $buyerOrderId, $unitId): StockMovement {
            $balance = $this->balance($storeId, $itemId);
            if (bccomp((string) $balance->qty, $qty, 4) < 0) {
                throw new RuntimeException('Insufficient stock.');
            }

            $left = $qty;
            $cost = 0;
            $layers = StockLayer::query()
                ->where('store_id', $storeId)
                ->where('item_id', $itemId)
                ->where('qty_remaining', '>', 0)
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            foreach ($layers as $layer) {
                if (bccomp($left, '0', 4) <= 0) {
                    break;
                }
                $take = bccomp((string) $layer->qty_remaining, $left, 4) <= 0 ? (string) $layer->qty_remaining : $left;
                $layer->qty_remaining = (float) bcsub((string) $layer->qty_remaining, $take, 4);
                $layer->save();
                $cost += (int) round((float) $take * (int) $layer->unit_cost_minor);
                $left = bcsub($left, $take, 4);
            }

            if (bccomp($left, '0', 4) > 0) {
                throw new RuntimeException('FIFO layers do not cover the issue quantity.');
            }

            $next = bcsub((string) $balance->qty, $qty, 4);
            $balance->qty = (float) $next;
            $balance->value_minor = max(0, (int) $balance->value_minor - $cost);
            $balance->save();

            $unit = bccomp($qty, '0', 4) > 0 ? (int) round($cost / (float) $qty) : 0;

            return $this->movement($storeId, $itemId, 'out', $qty, $unit, $next, $buyerOrderId, $unitId);
        });
    }

    public function onHandValue(int $storeId, int $itemId): int
    {
        return (int) StockLayer::query()
            ->where('store_id', $storeId)
            ->where('item_id', $itemId)
            ->get()
            ->sum(fn (StockLayer $layer): int => (int) round((float) $layer->qty_remaining * (int) $layer->unit_cost_minor));
    }

    private function balance(int $storeId, int $itemId): StockBalance
    {
        $balance = StockBalance::query()->firstOrNew([
            'store_id' => $storeId,
            'item_id' => $itemId,
        ]);
        if (! $balance->exists) {
            $balance->name = 'Balance '.$storeId.'-'.$itemId;
            $balance->qty = 0.0;
            $balance->value_minor = 0;
            $balance->save();
        }

        return $balance;
    }

    private function movement(int $storeId, int $itemId, string $direction, string $qty, int $unitCost, string $balanceAfter, ?int $buyerOrderId, ?int $unitId): StockMovement
    {
        return StockMovement::query()->create([
            'name' => strtoupper($direction).' '.$itemId,
            'store_id' => $storeId,
            'item_id' => $itemId,
            'buyer_order_id' => $buyerOrderId,
            'unit_id' => $unitId,
            'direction' => $direction,
            'qty' => $qty,
            'unit_cost_minor' => $unitCost,
            'balance_after' => $balanceAfter,
            'moved_at' => now(),
        ]);
    }
}
