<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BondLicense extends GarmentModel
{
    protected $table = 'bond_licenses';

    protected function casts(): array
    {
        return [
            'entitlement_minor' => 'integer',
            'utilized_minor' => 'integer',
            'expires_on' => 'date',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
