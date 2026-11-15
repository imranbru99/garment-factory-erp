<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\HourlyProduction;

class HourlyProductionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return HourlyProduction::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
