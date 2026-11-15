<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BillOfEntry extends GarmentModel
{
    protected $table = 'bills_of_entry';

    protected function casts(): array
    {
        return [
            'duty_minor' => 'integer',
            'cnf_minor' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<ImportDocument, $this> */
    public function importDocument(): BelongsTo
    {
        return $this->belongsTo(ImportDocument::class, 'import_document_id');
    }
}
