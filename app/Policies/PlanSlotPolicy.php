<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\PlanSlot;

class PlanSlotPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return PlanSlot::class;
    }

    protected function module(): string
    {
        return 'planning';
    }
}
