<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UtilizationDeclaration extends GarmentModel
{
    protected $table = 'utilization_declarations';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
            'expires_on' => 'date',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<LetterOfCredit, $this> */
    public function letterOfCredit(): BelongsTo
    {
        return $this->belongsTo(LetterOfCredit::class, 'letter_of_credit_id');
    }
    /** @return BelongsTo<BuyerOrder, $this> */
    public function buyerOrder(): BelongsTo
    {
        return $this->belongsTo(BuyerOrder::class, 'buyer_order_id');
    }
}
