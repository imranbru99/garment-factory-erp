<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Size;

class SizePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Size::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
