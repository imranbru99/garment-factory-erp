<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ProductCategory;

class ProductCategoryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return ProductCategory::class;
    }

    protected function module(): string
    {
        return 'website';
    }
}
