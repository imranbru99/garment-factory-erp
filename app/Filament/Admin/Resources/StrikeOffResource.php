<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\StrikeOff;
use App\Filament\Admin\Resources\StrikeOffResource\Pages;

class StrikeOffResource extends GarmentResource
{
    protected static ?string $model = StrikeOff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sampling';

    protected static ?string $moduleKey = 'sampling';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrikeOff::route('/'),
            'create' => Pages\CreateStrikeOff::route('/create'),
            'edit' => Pages\EditStrikeOff::route('/{record}/edit'),
        ];
    }
}
