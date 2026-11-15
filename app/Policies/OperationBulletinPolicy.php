<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\OperationBulletin;

class OperationBulletinPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return OperationBulletin::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
