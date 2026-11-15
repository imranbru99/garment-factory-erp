<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Line;

class LinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Line::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
