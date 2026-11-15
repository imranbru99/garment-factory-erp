<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Permission;

class PermissionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Permission::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
