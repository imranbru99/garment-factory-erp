<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UtilityLog extends GarmentModel
{
    protected $table = 'utility_logs';

    protected function casts(): array
    {
        return [
            'reading' => 'decimal:4',
            'consumption' => 'decimal:4',
            'logged_on' => 'date',
            'cost_minor' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
