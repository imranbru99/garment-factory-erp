<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\BondLicense;

class BondLicensePolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return BondLicense::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
