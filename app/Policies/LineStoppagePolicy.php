<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LineStoppage;

class LineStoppagePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LineStoppage::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
