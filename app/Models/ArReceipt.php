<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ArReceipt extends GarmentModel
{
    protected $table = 'ar_receipts';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
            'received_on' => 'date',
        ];
    }

    /** @return BelongsTo<ArInvoice, $this> */
    public function arInvoice(): BelongsTo
    {
        return $this->belongsTo(ArInvoice::class, 'ar_invoice_id');
    }
}
