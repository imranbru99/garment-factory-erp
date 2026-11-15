<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ApprovalRequest;

class ApprovalRequestPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ApprovalRequest::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
