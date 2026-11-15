<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FabricRoll extends GarmentModel
{
    protected $table = 'fabric_rolls';

    protected function casts(): array
    {
        return [
            'gsm' => 'decimal:4',
            'width_inch' => 'decimal:4',
            'shrinkage_percent' => 'decimal:4',
            'length_meter' => 'decimal:4',
            'weight_kg' => 'decimal:4',
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
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
    /** @return BelongsTo<Bin, $this> */
    public function bin(): BelongsTo
    {
        return $this->belongsTo(Bin::class, 'bin_id');
    }
}
