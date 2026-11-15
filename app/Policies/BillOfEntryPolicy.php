<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BillOfEntry;

class BillOfEntryPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BillOfEntry::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
