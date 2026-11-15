<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\QuotationLine;

class QuotationLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return QuotationLine::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
