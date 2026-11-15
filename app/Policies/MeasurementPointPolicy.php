<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\MeasurementPoint;

class MeasurementPointPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return MeasurementPoint::class;
    }

    protected function module(): string
    {
        return 'style';
    }
}
