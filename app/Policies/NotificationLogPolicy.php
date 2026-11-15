<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NotificationLog;

class NotificationLogPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NotificationLog::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
