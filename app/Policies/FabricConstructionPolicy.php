<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FabricConstruction;

class FabricConstructionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FabricConstruction::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
