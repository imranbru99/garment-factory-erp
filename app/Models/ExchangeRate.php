<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ExchangeRate extends GarmentModel
{
    protected $table = 'exchange_rates';

    protected function casts(): array
    {
        return [
            'rate' => 'decimal:4',
            'effective_on' => 'date',
        ];
    }

    /** @return BelongsTo<Currency, $this> */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
