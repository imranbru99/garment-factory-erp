<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\AppSetting;
use App\Filament\Admin\Resources\AppSettingResource\Pages;

class AppSettingResource extends GarmentResource
{
    protected static ?string $model = AppSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppSetting::route('/'),
            'create' => Pages\CreateAppSetting::route('/create'),
            'edit' => Pages\EditAppSetting::route('/{record}/edit'),
        ];
    }
}
