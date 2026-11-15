<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Grievance;

class GrievancePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Grievance::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
