<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Shift extends GarmentModel
{
    protected $table = 'shifts';

    protected function casts(): array
    {
        return [
            'break_minutes' => 'integer',
            'grace_minutes' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
