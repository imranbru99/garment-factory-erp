<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LeaveRequest;

class LeaveRequestPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LeaveRequest::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
