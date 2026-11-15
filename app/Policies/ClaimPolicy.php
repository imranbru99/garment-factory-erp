<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Claim;

class ClaimPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Claim::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
