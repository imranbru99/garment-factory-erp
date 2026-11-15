<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LcAmendment extends GarmentModel
{
    protected $table = 'lc_amendments';

    protected function casts(): array
    {
        return [
            'amendment_no' => 'integer',
            'amended_on' => 'date',
        ];
    }

    /** @return BelongsTo<LetterOfCredit, $this> */
    public function letterOfCredit(): BelongsTo
    {
        return $this->belongsTo(LetterOfCredit::class, 'letter_of_credit_id');
    }
}
