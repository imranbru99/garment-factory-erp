<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Floor extends GarmentModel
{
    protected $table = 'floors';

    protected function casts(): array
    {
        return [
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
