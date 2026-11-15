<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Incident;

class IncidentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Incident::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
