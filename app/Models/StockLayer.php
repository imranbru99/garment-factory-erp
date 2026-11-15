<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StockLayer extends GarmentModel
{
    protected $table = 'stock_layers';

    protected function casts(): array
    {
        return [
            'qty_remaining' => 'decimal:4',
            'unit_cost_minor' => 'integer',
            'received_at' => 'datetime',
        ];
    }

    /** @return BelongsTo<Store, $this> */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
