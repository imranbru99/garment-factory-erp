<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\TnaTemplate;

class TnaTemplatePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return TnaTemplate::class;
    }

    protected function module(): string
    {
        return 'orders';
    }
}
