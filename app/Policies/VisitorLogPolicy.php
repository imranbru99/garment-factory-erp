<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\VisitorLog;

class VisitorLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return VisitorLog::class;
    }

    protected function module(): string
    {
        return 'shipping';
    }
}
