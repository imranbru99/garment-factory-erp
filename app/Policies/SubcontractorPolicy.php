<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Subcontractor;

class SubcontractorPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Subcontractor::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
