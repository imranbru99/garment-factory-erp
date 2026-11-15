<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BomLine;

class BomLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BomLine::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
