<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BondEntry;

class BondEntryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BondEntry::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
