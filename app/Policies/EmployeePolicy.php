<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Employee;

class EmployeePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Employee::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
