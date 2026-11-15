<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Issue;

class IssuePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Issue::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
