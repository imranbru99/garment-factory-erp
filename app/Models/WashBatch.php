<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WashBatch extends GarmentModel
{
    protected $table = 'wash_batches';

    protected function casts(): array
    {
        return [
            'load_kg' => 'decimal:4',
            'pieces' => 'integer',
            'minutes' => 'integer',
            'water_liter' => 'decimal:4',
            'energy_kwh' => 'decimal:4',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<WashRecipe, $this> */
    public function washRecipe(): BelongsTo
    {
        return $this->belongsTo(WashRecipe::class, 'wash_recipe_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
}
