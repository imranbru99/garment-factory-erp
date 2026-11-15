<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SafetyCheck;
use App\Filament\Admin\Resources\SafetyCheckResource\Pages;

class SafetyCheckResource extends GarmentResource
{
    protected static ?string $model = SafetyCheck::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Maintenance';

    protected static ?string $moduleKey = 'maintenance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSafetyCheck::route('/'),
            'create' => Pages\CreateSafetyCheck::route('/create'),
            'edit' => Pages\EditSafetyCheck::route('/{record}/edit'),
        ];
    }
}
