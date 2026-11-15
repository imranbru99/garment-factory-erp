<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StockTransfer;

class StockTransferPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StockTransfer::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
