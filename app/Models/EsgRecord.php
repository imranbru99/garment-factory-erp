<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class EsgRecord extends GarmentModel
{
    protected $table = 'esg_records';

    protected function casts(): array
    {
        return [
            'energy_kwh' => 'decimal:4',
            'water_m3' => 'decimal:4',
            'waste_kg' => 'decimal:4',
            'carbon_kg' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
