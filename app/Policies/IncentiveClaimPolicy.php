<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\IncentiveClaim;

class IncentiveClaimPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return IncentiveClaim::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
