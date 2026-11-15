<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\GoodsReceipt;

class GoodsReceiptPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return GoodsReceipt::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
