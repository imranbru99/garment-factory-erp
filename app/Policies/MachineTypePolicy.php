<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\MachineType;

class MachineTypePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return MachineType::class;
    }

    protected function module(): string
    {
        return 'maintenance';
    }
}
