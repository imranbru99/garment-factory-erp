<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Rfq;

class RfqPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Rfq::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
