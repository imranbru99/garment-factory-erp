<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StockBalance;

class StockBalancePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StockBalance::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
