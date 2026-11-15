<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\RfqQuote;

class RfqQuotePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return RfqQuote::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
