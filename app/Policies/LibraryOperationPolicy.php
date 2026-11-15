<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LibraryOperation;

class LibraryOperationPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LibraryOperation::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
