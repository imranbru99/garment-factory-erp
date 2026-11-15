<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\HourlyProduction;
use App\Filament\Admin\Resources\HourlyProductionResource\Pages;

class HourlyProductionResource extends GarmentResource
{
    protected static ?string $model = HourlyProduction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHourlyProduction::route('/'),
            'create' => Pages\CreateHourlyProduction::route('/create'),
            'edit' => Pages\EditHourlyProduction::route('/{record}/edit'),
        ];
    }
}
