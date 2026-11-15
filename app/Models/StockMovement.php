<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StockMovement extends GarmentModel
{
    protected $table = 'stock_movements';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'unit_cost_minor' => 'integer',
            'balance_after' => 'decimal:4',
            'moved_at' => 'datetime',
            'reference_id' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Store, $this> */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    /** @return BelongsTo<FabricRoll, $this> */
    public function fabricRoll(): BelongsTo
    {
        return $this->belongsTo(FabricRoll::class, 'fabric_roll_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
}
