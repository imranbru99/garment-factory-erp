<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Defect;

class DefectPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Defect::class;
    }

    protected function module(): string
    {
        return 'quality';
    }
}
