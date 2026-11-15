<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\EmbroideryJob;

class EmbroideryJobPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return EmbroideryJob::class;
    }

    protected function module(): string
    {
        return 'embroidery';
    }
}
