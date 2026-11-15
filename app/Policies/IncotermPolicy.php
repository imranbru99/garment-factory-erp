<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Incoterm;

class IncotermPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Incoterm::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
