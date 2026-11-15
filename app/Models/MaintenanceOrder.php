<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class MaintenanceOrder extends GarmentModel
{
    protected $table = 'maintenance_orders';

    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'ended_at' => 'datetime',
            'downtime_minutes' => 'integer',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<FactoryMachine, $this> */
    public function factoryMachine(): BelongsTo
    {
        return $this->belongsTo(FactoryMachine::class, 'factory_machine_id');
    }
    /** @return BelongsTo<User, $this> */
    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mechanic_id');
    }
}
