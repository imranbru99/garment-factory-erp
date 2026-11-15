<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ObLine extends GarmentModel
{
    protected $table = 'ob_lines';

    protected function casts(): array
    {
        return [
            'smv' => 'decimal:4',
            'sort_order' => 'integer',
        ];
    }

    /** @return BelongsTo<OperationBulletin, $this> */
    public function operationBulletin(): BelongsTo
    {
        return $this->belongsTo(OperationBulletin::class, 'operation_bulletin_id');
    }
    /** @return BelongsTo<LibraryOperation, $this> */
    public function libraryOperation(): BelongsTo
    {
        return $this->belongsTo(LibraryOperation::class, 'library_operation_id');
    }
    /** @return BelongsTo<MachineType, $this> */
    public function machineType(): BelongsTo
    {
        return $this->belongsTo(MachineType::class, 'machine_type_id');
    }
}
