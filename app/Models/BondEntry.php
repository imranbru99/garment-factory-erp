<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BondEntry extends GarmentModel
{
    protected $table = 'bond_entries';

    protected function casts(): array
    {
        return [
            'amount_minor' => 'integer',
        ];
    }

    /** @return BelongsTo<BondLicense, $this> */
    public function bondLicense(): BelongsTo
    {
        return $this->belongsTo(BondLicense::class, 'bond_license_id');
    }
    /** @return BelongsTo<ImportDocument, $this> */
    public function importDocument(): BelongsTo
    {
        return $this->belongsTo(ImportDocument::class, 'import_document_id');
    }
}
