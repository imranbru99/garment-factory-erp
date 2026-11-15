<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\TnaMilestone;

class TnaMilestonePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return TnaMilestone::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
