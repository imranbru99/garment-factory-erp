<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PayrollPeriod extends GarmentModel
{
    protected $table = 'payroll_periods';

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'month' => 'integer',
            'starts_on' => 'date',
            'ends_on' => 'date',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
