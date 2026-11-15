<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CostingLine extends GarmentModel
{
    protected $table = 'costing_lines';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'unit_cost_minor' => 'integer',
            'wastage_percent' => 'decimal:4',
            'amount_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<Costing, $this> */
    public function costing(): BelongsTo
    {
        return $this->belongsTo(Costing::class, 'costing_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
