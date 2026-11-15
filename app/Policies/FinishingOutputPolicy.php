<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FinishingOutput;

class FinishingOutputPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FinishingOutput::class;
    }

    protected function module(): string
    {
        return 'finishing';
    }
}
