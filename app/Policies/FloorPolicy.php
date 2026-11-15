<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Floor;

class FloorPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Floor::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
