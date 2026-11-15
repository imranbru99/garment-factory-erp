<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SampleComment;

class SampleCommentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SampleComment::class;
    }

    protected function module(): string
    {
        return 'sampling';
    }
}
