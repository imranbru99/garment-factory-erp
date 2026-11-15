<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\MaterialRequirement;

class MaterialRequirementPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return MaterialRequirement::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
