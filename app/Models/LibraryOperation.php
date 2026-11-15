<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class LibraryOperation extends GarmentModel
{
    protected $table = 'library_operations';

    protected function casts(): array
    {
        return [
            'smv' => 'decimal:4',
        ];
    }

    /** @return BelongsTo<MachineType, $this> */
    public function machineType(): BelongsTo
    {
        return $this->belongsTo(MachineType::class, 'machine_type_id');
    }
}
