<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Lay;

class LayPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return Lay::class;
    }

    protected function module(): string
    {
        return 'cutting';
    }
}
