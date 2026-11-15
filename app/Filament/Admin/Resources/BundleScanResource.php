<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BundleScan;
use App\Filament\Admin\Resources\BundleScanResource\Pages;

class BundleScanResource extends GarmentResource
{
    protected static ?string $model = BundleScan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBundleScan::route('/'),
            'create' => Pages\CreateBundleScan::route('/create'),
            'edit' => Pages\EditBundleScan::route('/{record}/edit'),
        ];
    }
}
