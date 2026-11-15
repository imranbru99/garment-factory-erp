<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UomConversion extends GarmentModel
{
    protected $table = 'uom_conversions';

    protected function casts(): array
    {
        return [
            'factor' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<UnitOfMeasure, $this> */
    public function fromUom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'from_uom_id');
    }
    /** @return BelongsTo<UnitOfMeasure, $this> */
    public function toUom(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class, 'to_uom_id');
    }
}
