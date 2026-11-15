<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class OrderRevision extends GarmentModel
{
    protected $table = 'order_revisions';

    protected function casts(): array
    {
        return [
            'revision_no' => 'integer',
        ];
    }

    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
}
