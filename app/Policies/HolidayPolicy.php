<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Holiday;

class HolidayPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Holiday::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
