<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ArInvoice;

class ArInvoicePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ArInvoice::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
