<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StockReservation;

class StockReservationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StockReservation::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
