<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Marker extends GarmentModel
{
    protected $table = 'markers';

    protected function casts(): array
    {
        return [
            'efficiency_percent' => 'decimal:4',
            'length_meter' => 'decimal:4',
            'ply' => 'integer',
        ];
    }

    /** @return BelongsTo<CutPlan, $this> */
    public function cutPlan(): BelongsTo
    {
        return $this->belongsTo(CutPlan::class, 'cut_plan_id');
    }
}
