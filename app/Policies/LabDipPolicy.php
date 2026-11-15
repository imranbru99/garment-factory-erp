<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabDip;

class LabDipPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LabDip::class;
    }

    protected function module(): string
    {
        return 'sampling';
    }
}
