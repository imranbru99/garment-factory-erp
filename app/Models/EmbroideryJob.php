<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class EmbroideryJob extends GarmentModel
{
    protected $table = 'embroidery_jobs';

    protected function casts(): array
    {
        return [
            'sent_qty' => 'decimal:4',
            'received_qty' => 'decimal:4',
            'wastage_qty' => 'decimal:4',
            'rate_minor' => 'integer',
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
    /** @return BelongsTo<Subcontractor, $this> */
    public function subcontractor(): BelongsTo
    {
        return $this->belongsTo(Subcontractor::class, 'subcontractor_id');
    }
    /** @return BelongsTo<Bundle, $this> */
    public function bundle(): BelongsTo
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }
}
