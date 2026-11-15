<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Style;

class StylePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Style::class;
    }

    protected function module(): string
    {
        return 'style';
    }
}
