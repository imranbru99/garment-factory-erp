<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CommercialInvoice;

class CommercialInvoicePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CommercialInvoice::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
