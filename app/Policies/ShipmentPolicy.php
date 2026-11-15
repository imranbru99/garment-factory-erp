<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Shipment;

class ShipmentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Shipment::class;
    }

    protected function module(): string
    {
        return 'shipping';
    }
}
