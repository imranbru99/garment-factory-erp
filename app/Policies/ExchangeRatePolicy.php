<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ExchangeRate;

class ExchangeRatePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ExchangeRate::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
