<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Season;

class SeasonPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Season::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
