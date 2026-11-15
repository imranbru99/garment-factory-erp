<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FabricRoll;
use App\Filament\Admin\Resources\FabricRollResource\Pages;

class FabricRollResource extends GarmentResource
{
    protected static ?string $model = FabricRoll::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFabricRoll::route('/'),
            'create' => Pages\CreateFabricRoll::route('/create'),
            'edit' => Pages\EditFabricRoll::route('/{record}/edit'),
        ];
    }
}
