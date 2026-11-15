<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Department;

class DepartmentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Department::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
