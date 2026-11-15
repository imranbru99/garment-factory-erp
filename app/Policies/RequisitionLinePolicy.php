<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\RequisitionLine;

class RequisitionLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return RequisitionLine::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
