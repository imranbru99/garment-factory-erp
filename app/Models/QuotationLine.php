<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class QuotationLine extends GarmentModel
{
    protected $table = 'quotation_lines';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'price_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<Quotation, $this> */
    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }
}
