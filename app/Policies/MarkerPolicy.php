<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Marker;

class MarkerPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Marker::class;
    }

    protected function module(): string
    {
        return 'cutting';
    }
}
