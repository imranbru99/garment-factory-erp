<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FixedAsset;
use App\Filament\Admin\Resources\FixedAssetResource\Pages;

class FixedAssetResource extends GarmentResource
{
    protected static ?string $model = FixedAsset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFixedAsset::route('/'),
            'create' => Pages\CreateFixedAsset::route('/create'),
            'edit' => Pages\EditFixedAsset::route('/{record}/edit'),
        ];
    }
}
