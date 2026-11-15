<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Store;
use App\Filament\Admin\Resources\StoreResource\Pages;

class StoreResource extends GarmentResource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStore::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}
