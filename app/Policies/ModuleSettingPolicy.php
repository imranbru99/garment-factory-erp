<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ModuleSetting;

class ModuleSettingPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ModuleSetting::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
