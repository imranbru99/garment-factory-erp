<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class NumberingCounter extends GarmentModel
{
    protected $table = 'numbering_counters';

    protected function casts(): array
    {
        return [
            'last_number' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<NumberingSeries, $this> */
    public function numberingSeries(): BelongsTo
    {
        return $this->belongsTo(NumberingSeries::class, 'numbering_series_id');
    }
}
