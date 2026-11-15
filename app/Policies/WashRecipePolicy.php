<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\WashRecipe;

class WashRecipePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return WashRecipe::class;
    }

    protected function module(): string
    {
        return 'wash';
    }
}
