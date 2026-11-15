<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Bundle;

class BundlePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Bundle::class;
    }

    protected function module(): string
    {
        return 'cutting';
    }
}
