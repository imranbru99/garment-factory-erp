<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BundleScan;

class BundleScanPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BundleScan::class;
    }

    protected function module(): string
    {
        return 'sewing';
    }
}
