<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AppSetting;

class AppSettingPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return AppSetting::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
