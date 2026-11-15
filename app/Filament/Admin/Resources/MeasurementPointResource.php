<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\MeasurementPoint;
use App\Filament\Admin\Resources\MeasurementPointResource\Pages;

class MeasurementPointResource extends GarmentResource
{
    protected static ?string $model = MeasurementPoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Style & Costing';

    protected static ?string $moduleKey = 'style';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeasurementPoint::route('/'),
            'create' => Pages\CreateMeasurementPoint::route('/create'),
            'edit' => Pages\EditMeasurementPoint::route('/{record}/edit'),
        ];
    }
}
