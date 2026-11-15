<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NotificationTemplate;

class NotificationTemplatePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return NotificationTemplate::class;
    }

    protected function module(): string
    {
        return 'foundation';
    }
}
