<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\IssueTask;

class IssueTaskPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return IssueTask::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
