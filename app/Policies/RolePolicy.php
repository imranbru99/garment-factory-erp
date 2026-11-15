<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Role;

class RolePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Role::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
