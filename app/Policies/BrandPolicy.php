<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Brand;

class BrandPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Brand::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
