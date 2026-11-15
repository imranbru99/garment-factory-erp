<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LcAmendment;

class LcAmendmentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LcAmendment::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
