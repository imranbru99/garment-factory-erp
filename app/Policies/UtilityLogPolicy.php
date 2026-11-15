<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\UtilityLog;

class UtilityLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return UtilityLog::class;
    }

    protected function module(): string
    {
        return 'maintenance';
    }
}
