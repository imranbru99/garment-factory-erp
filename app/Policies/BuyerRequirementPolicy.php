<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BuyerRequirement;

class BuyerRequirementPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BuyerRequirement::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
