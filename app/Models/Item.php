<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Item extends GarmentModel
{
    protected $table = 'items';

    protected function casts(): array
    {
        return [
            'reorder_level' => 'decimal:4',
            'standard_cost_minor' => 'integer',
            'is_buyer_supplied' => 'boolean',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<ItemGroup, $this> */
    public function itemGroup(): BelongsTo
    {
        return $this->belongsTo(ItemGroup::class, 'item_group_id');
    }
    /** @return BelongsTo<UnitOfMeasure, $this> */
    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id');
    }
    /** @return BelongsTo<HsCode, $this> */
    public function hsCode(): BelongsTo
    {
        return $this->belongsTo(HsCode::class, 'hs_code_id');
    }
}
