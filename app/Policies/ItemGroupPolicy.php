<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ItemGroup;

class ItemGroupPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ItemGroup::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
