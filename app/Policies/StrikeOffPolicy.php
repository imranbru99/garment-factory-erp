<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StrikeOff;

class StrikeOffPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return StrikeOff::class;
    }

    protected function module(): string
    {
        return 'sampling';
    }
}
