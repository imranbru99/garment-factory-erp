<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ArReceipt;

class ArReceiptPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ArReceipt::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
