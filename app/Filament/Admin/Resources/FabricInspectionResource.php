<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FabricInspection;
use App\Filament\Admin\Resources\FabricInspectionResource\Pages;

class FabricInspectionResource extends GarmentResource
{
    protected static ?string $model = FabricInspection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Laboratory';

    protected static ?string $moduleKey = 'lab';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFabricInspection::route('/'),
            'create' => Pages\CreateFabricInspection::route('/create'),
            'edit' => Pages\EditFabricInspection::route('/{record}/edit'),
        ];
    }
}
