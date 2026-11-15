<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\UtilityLog;
use App\Filament\Admin\Resources\UtilityLogResource\Pages;

class UtilityLogResource extends GarmentResource
{
    protected static ?string $model = UtilityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Maintenance';

    protected static ?string $moduleKey = 'maintenance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUtilityLog::route('/'),
            'create' => Pages\CreateUtilityLog::route('/create'),
            'edit' => Pages\EditUtilityLog::route('/{record}/edit'),
        ];
    }
}
