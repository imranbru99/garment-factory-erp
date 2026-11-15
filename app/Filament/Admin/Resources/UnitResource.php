<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Unit;
use App\Filament\Admin\Resources\UnitResource\Pages;

class UnitResource extends GarmentResource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUnit::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
