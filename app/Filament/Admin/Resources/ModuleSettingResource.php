<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ModuleSetting;
use App\Filament\Admin\Resources\ModuleSettingResource\Pages;

class ModuleSettingResource extends GarmentResource
{
    protected static ?string $model = ModuleSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListModuleSetting::route('/'),
            'create' => Pages\CreateModuleSetting::route('/create'),
            'edit' => Pages\EditModuleSetting::route('/{record}/edit'),
        ];
    }
}
