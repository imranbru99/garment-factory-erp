<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LinePlan;

class LinePlanPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LinePlan::class;
    }

    protected function module(): string
    {
        return 'planning';
    }
}
