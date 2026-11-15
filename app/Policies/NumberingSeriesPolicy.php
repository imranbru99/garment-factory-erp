<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NumberingSeries;

class NumberingSeriesPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NumberingSeries::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
