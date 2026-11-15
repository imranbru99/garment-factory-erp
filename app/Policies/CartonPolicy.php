<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Carton;

class CartonPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Carton::class;
    }

    protected function module(): string
    {
        return 'finishing';
    }
}
