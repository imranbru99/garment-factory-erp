<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\TnaTemplateTask;

class TnaTemplateTaskPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return TnaTemplateTask::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
