<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\WashBatch;

class WashBatchPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return WashBatch::class;
    }

    protected function module(): string
    {
        return 'wash';
    }
}
