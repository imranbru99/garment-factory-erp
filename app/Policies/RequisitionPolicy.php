<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Requisition;

class RequisitionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Requisition::class;
    }

    protected function module(): string
    {
        return 'procurement';
    }
}
