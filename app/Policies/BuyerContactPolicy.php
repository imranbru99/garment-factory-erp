<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BuyerContact;

class BuyerContactPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BuyerContact::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
