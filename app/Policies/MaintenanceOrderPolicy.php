<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\MaintenanceOrder;

class MaintenanceOrderPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return MaintenanceOrder::class;
    }

    protected function module(): string
    {
        return 'maintenance';
    }
}
