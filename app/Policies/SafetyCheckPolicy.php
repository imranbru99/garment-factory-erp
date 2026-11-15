<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SafetyCheck;

class SafetyCheckPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SafetyCheck::class;
    }

    protected function module(): string
    {
        return 'maintenance';
    }
}
