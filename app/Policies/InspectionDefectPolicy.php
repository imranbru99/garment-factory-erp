<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\InspectionDefect;

class InspectionDefectPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return InspectionDefect::class;
    }

    protected function module(): string
    {
        return 'lab';
    }
}
