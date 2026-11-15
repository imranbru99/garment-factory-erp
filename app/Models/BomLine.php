<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BomLine extends GarmentModel
{
    protected $table = 'bom_lines';

    protected function casts(): array
    {
        return [
            'consumption' => 'decimal:4',
            'wastage_percent' => 'decimal:4',
            'required_qty' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<Bom, $this> */
    public function bom(): BelongsTo
    {
        return $this->belongsTo(Bom::class, 'bom_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    /** @return BelongsTo<Color, $this> */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    /** @return BelongsTo<Size, $this> */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    /** @return BelongsTo<UnitOfMeasure, $this> */
    public function uom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id');
    }
}
