<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StockLayer;

class StockLayerPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StockLayer::class;
    }

    protected function module(): string
    {
        return 'inventory';
    }
}
