<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Realization extends GarmentModel
{
    protected $table = 'realizations';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
            'realized_on' => 'date',
            'exchange_rate' => 'decimal:4',
            'gain_loss_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<CommercialInvoice, $this> */
    public function commercialInvoice(): BelongsTo
    {
        return $this->belongsTo(CommercialInvoice::class, 'commercial_invoice_id');
    }
    /** @return BelongsTo<Bank, $this> */
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
