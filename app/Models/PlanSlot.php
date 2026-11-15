<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PlanSlot extends GarmentModel
{
    protected $table = 'plan_slots';

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'qty' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<LinePlan, $this> */
    public function linePlan(): BelongsTo
    {
        return $this->belongsTo(LinePlan::class, 'line_plan_id');
    }
}
