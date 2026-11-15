<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Designation;

class DesignationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Designation::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
