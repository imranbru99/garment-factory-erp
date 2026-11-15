<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\JobPost;

class JobPostPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return JobPost::class;
    }

    protected function module(): string
    {
        return 'hr';
    }
}
