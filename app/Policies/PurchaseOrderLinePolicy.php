<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PurchaseOrderLine;

class PurchaseOrderLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PurchaseOrderLine::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
