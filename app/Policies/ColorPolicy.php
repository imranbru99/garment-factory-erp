<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Color;

class ColorPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Color::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
