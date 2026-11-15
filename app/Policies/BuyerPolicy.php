<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Buyer;

class BuyerPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Buyer::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
