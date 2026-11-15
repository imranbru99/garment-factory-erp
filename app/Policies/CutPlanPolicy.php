<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CutPlan;

class CutPlanPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CutPlan::class;
    }

    protected function module(): string
    {
        return 'cutting';
    }
}
