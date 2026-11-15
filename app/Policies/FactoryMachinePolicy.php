<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FactoryMachine;

class FactoryMachinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FactoryMachine::class;
    }

    protected function module(): string
    {
        return 'maintenance';
    }
}
