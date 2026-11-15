<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Forwarder;

class ForwarderPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Forwarder::class;
    }

    protected function module(): string
    {
        return 'shipping';
    }
}
