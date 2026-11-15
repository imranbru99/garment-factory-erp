<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Brand extends GarmentModel
{
    protected $table = 'brands';

    /** @return BelongsTo<Buyer, $this> */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
}
