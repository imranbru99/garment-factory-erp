<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ApprovalChain;

class ApprovalChainPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ApprovalChain::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
