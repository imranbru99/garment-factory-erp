<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BundleScan extends GarmentModel
{
    protected $table = 'bundle_scans';

    protected function casts(): array
    {
        return [
            'qty' => 'decimal:4',
            'scanned_at' => 'datetime',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Bundle, $this> */
    public function bundle(): BelongsTo
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }
    /** @return BelongsTo<Line, $this> */
    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }
    /** @return BelongsTo<LibraryOperation, $this> */
    public function libraryOperation(): BelongsTo
    {
        return $this->belongsTo(LibraryOperation::class, 'library_operation_id');
    }
    /** @return BelongsTo<User, $this> */
    public function scannedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }
}
