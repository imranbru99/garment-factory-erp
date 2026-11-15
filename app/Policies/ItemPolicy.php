<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Item;

class ItemPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Item::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
