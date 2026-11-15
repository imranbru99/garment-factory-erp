<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Shipment extends GarmentModel
{
    protected $table = 'shipments';

    protected function casts(): array
    {
        return [
            'ship_on' => 'date',
            'cbm' => 'decimal:4',
            'cartons' => 'integer',
            'short_qty' => 'decimal:4',
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
    /** @return BelongsTo<Forwarder, $this> */
    public function forwarder(): BelongsTo
    {
        return $this->belongsTo(Forwarder::class, 'forwarder_id');
    }
}
