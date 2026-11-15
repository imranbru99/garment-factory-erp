<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Currency;

class CurrencyPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Currency::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
