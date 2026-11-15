<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BuyerOrder extends GarmentModel
{
    protected $table = 'buyer_orders';

    protected function casts(): array
    {
        return [
            'exchange_rate' => 'decimal:4',
            'ship_on' => 'date',
            'ex_factory_on' => 'date',
            'qty' => 'decimal:4',
            'fob_minor' => 'integer',
            'confirmed_at' => 'datetime',
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
    /** @return BelongsTo<Style, $this> */
    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    /** @return BelongsTo<Costing, $this> */
    public function costing(): BelongsTo
    {
        return $this->belongsTo(Costing::class, 'costing_id');
    }
    /** @return BelongsTo<Season, $this> */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
    /** @return BelongsTo<User, $this> */
    public function merchandiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'merchandiser_id');
    }
    /** @return BelongsTo<Incoterm, $this> */
    public function incoterm(): BelongsTo
    {
        return $this->belongsTo(Incoterm::class, 'incoterm_id');
    }
    /** @return BelongsTo<PaymentTerm, $this> */
    public function paymentTerm(): BelongsTo
    {
        return $this->belongsTo(PaymentTerm::class, 'payment_term_id');
    }
}
