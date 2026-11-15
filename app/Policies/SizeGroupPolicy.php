<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SizeGroup;

class SizeGroupPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return SizeGroup::class;
    }

    protected function module(): string
    {
        return 'master';
    }
}
