<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Capa;

class CapaPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Capa::class;
    }

    protected function module(): string
    {
        return 'quality';
    }
}
