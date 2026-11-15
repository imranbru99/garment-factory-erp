<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LabTest;

class LabTestPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LabTest::class;
    }

    protected function module(): string
    {
        return 'lab';
    }
}
