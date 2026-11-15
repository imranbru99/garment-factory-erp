<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PaymentTerm;

class PaymentTermPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PaymentTerm::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
