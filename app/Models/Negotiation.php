<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Negotiation extends GarmentModel
{
    protected $table = 'negotiations';

    protected function casts(): array
    {
        return [
            'target_minor' => 'integer',
            'offered_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<Quotation, $this> */
    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }
    /** @return BelongsTo<Buyer, $this> */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
}
