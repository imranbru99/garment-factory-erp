<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PurchaseOrder;

class PurchaseOrderPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PurchaseOrder::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
