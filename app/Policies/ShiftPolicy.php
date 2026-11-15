<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Shift;

class ShiftPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Shift::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
