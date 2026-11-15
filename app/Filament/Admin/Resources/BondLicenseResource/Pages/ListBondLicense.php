<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BondLicenseResource\Pages;

use App\Filament\Admin\Resources\BondLicenseResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBondLicense extends ListsGarmentRecords
{
    protected static string $resource = BondLicenseResource::class;
}
