<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Bom;

class BomPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Bom::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
