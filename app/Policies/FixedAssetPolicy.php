<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FixedAsset;

class FixedAssetPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return FixedAsset::class;
    }

    protected function module(): string
    {
        return 'accounts';
    }
}
