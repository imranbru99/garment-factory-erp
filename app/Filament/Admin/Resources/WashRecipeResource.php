<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\WashRecipe;
use App\Filament\Admin\Resources\WashRecipeResource\Pages;

class WashRecipeResource extends GarmentResource
{
    protected static ?string $model = WashRecipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Wash';

    protected static ?string $moduleKey = 'wash';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWashRecipe::route('/'),
            'create' => Pages\CreateWashRecipe::route('/create'),
            'edit' => Pages\EditWashRecipe::route('/{record}/edit'),
        ];
    }
}
