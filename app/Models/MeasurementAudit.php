<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class MeasurementAudit extends GarmentModel
{
    protected $table = 'measurement_audits';

    protected function casts(): array
    {
        return [
            'within_tolerance' => 'boolean',
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
    /** @return BelongsTo<Style, $this> */
    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    /** @return BelongsTo<Size, $this> */
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
