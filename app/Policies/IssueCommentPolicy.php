<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\IssueComment;

class IssueCommentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return IssueComment::class;
    }

    protected function module(): string
    {
        return 'issues';
    }
}
