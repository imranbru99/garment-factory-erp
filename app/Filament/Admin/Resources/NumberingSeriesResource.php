<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\NumberingSeries;
use App\Filament\Admin\Resources\NumberingSeriesResource\Pages;

class NumberingSeriesResource extends GarmentResource
{
    protected static ?string $model = NumberingSeries::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNumberingSeries::route('/'),
            'create' => Pages\CreateNumberingSeries::route('/create'),
            'edit' => Pages\EditNumberingSeries::route('/{record}/edit'),
        ];
    }
}
