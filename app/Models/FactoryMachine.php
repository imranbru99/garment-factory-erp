<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FactoryMachine extends GarmentModel
{
    protected $table = 'factory_machines';

    protected function casts(): array
    {
        return [
            'installed_on' => 'date',
            'warranty_until' => 'date',
            'purchase_minor' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<MachineType, $this> */
    public function machineType(): BelongsTo
    {
        return $this->belongsTo(MachineType::class, 'machine_type_id');
    }
    /** @return BelongsTo<Line, $this> */
    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class, 'line_id');
    }
}
