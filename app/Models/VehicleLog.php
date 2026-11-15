<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class VehicleLog extends GarmentModel
{
    protected $table = 'vehicle_logs';

    protected function casts(): array
    {
        return [
            'in_at' => 'datetime',
            'out_at' => 'datetime',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
