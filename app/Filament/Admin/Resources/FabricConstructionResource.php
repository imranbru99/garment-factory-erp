<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FabricConstruction;
use App\Filament\Admin\Resources\FabricConstructionResource\Pages;

class FabricConstructionResource extends GarmentResource
{
    protected static ?string $model = FabricConstruction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFabricConstruction::route('/'),
            'create' => Pages\CreateFabricConstruction::route('/create'),
            'edit' => Pages\EditFabricConstruction::route('/{record}/edit'),
        ];
    }
}
