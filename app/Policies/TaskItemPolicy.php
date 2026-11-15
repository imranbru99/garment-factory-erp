<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\TaskItem;

class TaskItemPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return TaskItem::class;
    }

    protected function module(): string
    {
        return 'communication';
    }
}
