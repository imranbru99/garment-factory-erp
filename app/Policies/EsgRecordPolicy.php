<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\EsgRecord;

class EsgRecordPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return EsgRecord::class;
    }

    protected function module(): string
    {
        return 'compliance';
    }
}
