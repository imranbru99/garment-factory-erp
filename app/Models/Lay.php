<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Lay extends GarmentModel
{
    protected $table = 'lays';

    protected function casts(): array
    {
        return [
            'ply' => 'integer',
            'used_meter' => 'decimal:4',
            'endbit_meter' => 'decimal:4',
            'remnant_meter' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<CutPlan, $this> */
    public function cutPlan(): BelongsTo
    {
        return $this->belongsTo(CutPlan::class, 'cut_plan_id');
    }
    /** @return BelongsTo<Marker, $this> */
    public function marker(): BelongsTo
    {
        return $this->belongsTo(Marker::class, 'marker_id');
    }
    /** @return BelongsTo<FabricRoll, $this> */
    public function fabricRoll(): BelongsTo
    {
        return $this->belongsTo(FabricRoll::class, 'fabric_roll_id');
    }
}
