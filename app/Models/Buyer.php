<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Buyer extends GarmentModel
{
    protected $table = 'buyers';

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Country, $this> */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    /** @return BelongsTo<BuyingHouse, $this> */
    public function buyingHouse(): BelongsTo
    {
        return $this->belongsTo(BuyingHouse::class, 'buying_house_id');
    }
}
