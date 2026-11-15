<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ArInvoice extends GarmentModel
{
    protected $table = 'ar_invoices';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
            'balance_minor' => 'integer',
            'due_on' => 'date',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Buyer, $this> */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    /** @return BelongsTo<CommercialInvoice, $this> */
    public function commercialInvoice(): BelongsTo
    {
        return $this->belongsTo(CommercialInvoice::class, 'commercial_invoice_id');
    }
}
