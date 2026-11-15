<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\WashType;
use App\Filament\Admin\Resources\WashTypeResource\Pages;

class WashTypeResource extends GarmentResource
{
    protected static ?string $model = WashType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Wash';

    protected static ?string $moduleKey = 'wash';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWashType::route('/'),
            'create' => Pages\CreateWashType::route('/create'),
            'edit' => Pages\EditWashType::route('/{record}/edit'),
        ];
    }
}
