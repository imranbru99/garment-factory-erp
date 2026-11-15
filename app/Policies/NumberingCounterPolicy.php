<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NumberingCounter;

class NumberingCounterPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NumberingCounter::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
