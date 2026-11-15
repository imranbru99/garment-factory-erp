<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SampleRequest extends GarmentModel
{
    protected $table = 'sample_requests';

    protected function casts(): array
    {
        return [
            'due_on' => 'date',
            'round' => 'integer',
            'cost_minor' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Style, $this> */
    public function style(): BelongsTo
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    /** @return BelongsTo<Buyer, $this> */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function order(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'order_id');
    }
}
