<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Unit;

class UnitPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Unit::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
