<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BuyingHouse;

class BuyingHousePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BuyingHouse::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
