<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BondLicense;
use App\Filament\Admin\Resources\BondLicenseResource\Pages;

class BondLicenseResource extends GarmentResource
{
    protected static ?string $model = BondLicense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBondLicense::route('/'),
            'create' => Pages\CreateBondLicense::route('/create'),
            'edit' => Pages\EditBondLicense::route('/{record}/edit'),
        ];
    }
}
