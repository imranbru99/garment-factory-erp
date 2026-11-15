<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Quotation;

class QuotationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Quotation::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
