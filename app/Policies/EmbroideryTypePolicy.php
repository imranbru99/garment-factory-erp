<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\EmbroideryType;

class EmbroideryTypePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return EmbroideryType::class;
    }

    protected function module(): string
    {
        return 'embroidery';
    }
}
