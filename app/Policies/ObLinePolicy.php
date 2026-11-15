<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ObLine;

class ObLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ObLine::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
