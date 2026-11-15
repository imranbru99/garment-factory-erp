<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\UnitOfMeasure;
use App\Filament\Admin\Resources\UnitOfMeasureResource\Pages;

class UnitOfMeasureResource extends GarmentResource
{
    protected static ?string $model = UnitOfMeasure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUnitOfMeasure::route('/'),
            'create' => Pages\CreateUnitOfMeasure::route('/create'),
            'edit' => Pages\EditUnitOfMeasure::route('/{record}/edit'),
        ];
    }
}
