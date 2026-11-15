<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class RequisitionLine extends GarmentModel
{
    protected $table = 'requisition_lines';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'needed_on' => 'date',
        ];
    }

    /** @return BelongsTo<Requisition, $this> */
    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }
    /** @return BelongsTo<Item, $this> */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
