<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CostingLine;

class CostingLinePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return CostingLine::class;
    }

    protected function module(): string
    {
        return 'style';
    }
}
