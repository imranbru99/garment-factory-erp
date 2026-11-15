<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BuyerOrder;

class BuyerOrderPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BuyerOrder::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
