<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Costing;

class CostingPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Costing::class;
    }

    protected function module(): string
    {
        return 'style';
    }
}
