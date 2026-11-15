<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CartonItem;
use App\Filament\Admin\Resources\CartonItemResource\Pages;

class CartonItemResource extends GarmentResource
{
    protected static ?string $model = CartonItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Finishing';

    protected static ?string $moduleKey = 'finishing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCartonItem::route('/'),
            'create' => Pages\CreateCartonItem::route('/create'),
            'edit' => Pages\EditCartonItem::route('/{record}/edit'),
        ];
    }
}
