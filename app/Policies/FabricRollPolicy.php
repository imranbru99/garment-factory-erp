<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FabricRoll;

class FabricRollPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FabricRoll::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
