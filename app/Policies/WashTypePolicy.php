<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\WashType;

class WashTypePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return WashType::class;
    }

    protected function module(): string
    {
        return 'wash';
    }
}
