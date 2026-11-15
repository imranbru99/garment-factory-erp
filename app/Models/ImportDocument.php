<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ImportDocument extends GarmentModel
{
    protected $table = 'import_documents';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Supplier, $this> */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    /** @return BelongsTo<LetterOfCredit, $this> */
    public function letterOfCredit(): BelongsTo
    {
        return $this->belongsTo(LetterOfCredit::class, 'letter_of_credit_id');
    }
}
