<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\MaterialRequirement;
use App\Filament\Admin\Resources\MaterialRequirementResource\Pages;

class MaterialRequirementResource extends GarmentResource
{
    protected static ?string $model = MaterialRequirement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterialRequirement::route('/'),
            'create' => Pages\CreateMaterialRequirement::route('/create'),
            'edit' => Pages\EditMaterialRequirement::route('/{record}/edit'),
        ];
    }
}
