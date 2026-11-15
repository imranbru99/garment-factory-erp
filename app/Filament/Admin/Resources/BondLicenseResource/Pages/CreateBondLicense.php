<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BondLicenseResource\Pages;

use App\Filament\Admin\Resources\BondLicenseResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateBondLicense extends CreatesGarmentRecord
{
    protected static string $resource = BondLicenseResource::class;
}
