<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FabricInspection;

class FabricInspectionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FabricInspection::class;
    }

    protected function module(): string
    {
        return 'lab';
    }
}
