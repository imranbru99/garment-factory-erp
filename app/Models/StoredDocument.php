<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StoredDocument extends GarmentModel
{
    protected $table = 'stored_documents';

    protected function casts(): array
    {
        return [
            'size_bytes' => 'integer',
            'version' => 'integer',
            'expires_on' => 'date',
            'subject_id' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<User, $this> */
    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
