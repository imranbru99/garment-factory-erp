<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NeedleLog;

class NeedleLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NeedleLog::class;
    }

    protected function module(): string
    {
        return 'quality';
    }
}
