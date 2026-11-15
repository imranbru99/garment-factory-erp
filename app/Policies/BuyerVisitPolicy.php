<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BuyerVisit;

class BuyerVisitPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BuyerVisit::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
