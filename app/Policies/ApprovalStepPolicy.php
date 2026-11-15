<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ApprovalStep;

class ApprovalStepPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ApprovalStep::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
