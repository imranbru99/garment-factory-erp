<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SupplierInvoice;

class SupplierInvoicePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SupplierInvoice::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
