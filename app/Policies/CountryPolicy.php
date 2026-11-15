<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Country;

class CountryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Country::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
