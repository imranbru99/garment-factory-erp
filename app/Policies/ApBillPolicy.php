<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ApBill;

class ApBillPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ApBill::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
