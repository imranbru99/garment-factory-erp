<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Carton extends GarmentModel
{
    protected $table = 'cartons';

    protected function casts(): array
    {
        return [
            'length_cm' => 'decimal:4',
            'width_cm' => 'decimal:4',
            'height_cm' => 'decimal:4',
            'gross_kg' => 'decimal:4',
            'net_kg' => 'decimal:4',
            'cbm' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
    /** @return BelongsTo<Shipment, $this> */
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class, 'shipment_id');
    }
}
