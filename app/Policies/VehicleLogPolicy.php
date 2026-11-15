<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\VehicleLog;

class VehicleLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return VehicleLog::class;
    }

    protected function module(): string
    {
        return 'shipping';
    }
}
