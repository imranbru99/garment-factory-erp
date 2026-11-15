<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NewsPost;

class NewsPostPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NewsPost::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
