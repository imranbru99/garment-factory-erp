<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SupplierContact;

class SupplierContactPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SupplierContact::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
