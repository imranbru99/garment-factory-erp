<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\IssueType;

class IssueTypePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return IssueType::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
