<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\UnitOfMeasure;

class UnitOfMeasurePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return UnitOfMeasure::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
