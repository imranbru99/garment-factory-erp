<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\QcInspection;

class QcInspectionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return QcInspection::class;
    }

    protected function module(): string
    {
        return 'quality';
    }
}
