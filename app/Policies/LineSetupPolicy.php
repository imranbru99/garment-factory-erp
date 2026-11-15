<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LineSetup;

class LineSetupPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LineSetup::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
