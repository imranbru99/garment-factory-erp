<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Store;

class StorePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Store::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
