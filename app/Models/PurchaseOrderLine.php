<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PurchaseOrderLine extends GarmentModel
{
    protected $table = 'purchase_order_lines';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'price_minor' => 'integer',
            'received_qty' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<PurchaseOrder, $this> */
    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
