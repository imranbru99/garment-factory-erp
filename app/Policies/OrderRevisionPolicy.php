<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\OrderRevision;

class OrderRevisionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return OrderRevision::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
