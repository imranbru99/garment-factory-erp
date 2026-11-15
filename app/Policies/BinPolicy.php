<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Bin;

class BinPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Bin::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
