<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FabricInspection extends GarmentModel
{
    protected $table = 'fabric_inspections';

    protected function casts(): array
    {
        return [
            'points' => 'decimal:4',
            'length_meter' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<FabricRoll, $this> */
    public function fabricRoll(): BelongsTo
    {
        return $this->belongsTo(FabricRoll::class, 'fabric_roll_id');
    }
}
