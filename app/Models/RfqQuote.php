<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class RfqQuote extends GarmentModel
{
    protected $table = 'rfq_quotes';

    protected function casts(): array
    {
        return [
            'price_minor' => 'integer',
            'lead_days' => 'integer',
            'is_selected' => 'boolean',
        ];
    }

    /** @return BelongsTo<Rfq, $this> */
    public function rfq(): BelongsTo
    {
        return $this->belongsTo(Rfq::class, 'rfq_id');
    }
    /** @return BelongsTo<Supplier, $this> */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
