<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\GoodsReceiptLine;

class GoodsReceiptLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return GoodsReceiptLine::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
