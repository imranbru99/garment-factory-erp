<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ApprovalAction;

class ApprovalActionPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ApprovalAction::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
