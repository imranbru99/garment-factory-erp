<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Realization;

class RealizationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Realization::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
