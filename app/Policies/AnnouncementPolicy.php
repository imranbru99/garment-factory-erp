<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Announcement;

class AnnouncementPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Announcement::class;
    }

    protected function module(): string
    {
        return 'communication';
    }
}
