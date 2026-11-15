<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Negotiation;

class NegotiationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Negotiation::class;
    }

    protected function module(): string
    {
        return 'marketing';
    }
}
