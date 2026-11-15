<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class QcInspection extends GarmentModel
{
    protected $table = 'qc_inspections';

    protected function casts(): array
    {
        return [
            'lot_qty' => 'integer',
            'sample_size' => 'integer',
            'aql' => 'decimal:4',
            'accept_point' => 'integer',
            'reject_point' => 'integer',
            'major' => 'integer',
            'minor' => 'integer',
            'critical' => 'integer',
            'inspected_at' => 'datetime',
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
    /** @return BelongsTo<Line, $this> */
    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }
    /** @return BelongsTo<User, $this> */
    public function inspector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
}
