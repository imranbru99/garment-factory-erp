<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CycleCount;

class CycleCountPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CycleCount::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
