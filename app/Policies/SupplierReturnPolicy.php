<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SupplierReturn;

class SupplierReturnPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SupplierReturn::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
