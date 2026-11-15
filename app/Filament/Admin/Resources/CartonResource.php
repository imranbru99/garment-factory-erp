<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Carton;
use App\Filament\Admin\Resources\CartonResource\Pages;

class CartonResource extends GarmentResource
{
    protected static ?string $model = Carton::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Finishing';

    protected static ?string $moduleKey = 'finishing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarton::route('/'),
            'create' => Pages\CreateCarton::route('/create'),
            'edit' => Pages\EditCarton::route('/{record}/edit'),
        ];
    }
}
