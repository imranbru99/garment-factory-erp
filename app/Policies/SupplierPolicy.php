<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Supplier;

class SupplierPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Supplier::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
