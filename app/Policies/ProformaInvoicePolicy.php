<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ProformaInvoice;

class ProformaInvoicePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ProformaInvoice::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
