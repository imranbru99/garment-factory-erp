<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\OrderLine;

class OrderLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return OrderLine::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
