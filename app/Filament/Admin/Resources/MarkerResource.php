<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Marker;
use App\Filament\Admin\Resources\MarkerResource\Pages;

class MarkerResource extends GarmentResource
{
    protected static ?string $model = Marker::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Cutting';

    protected static ?string $moduleKey = 'cutting';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMarker::route('/'),
            'create' => Pages\CreateMarker::route('/create'),
            'edit' => Pages\EditMarker::route('/{record}/edit'),
        ];
    }
}
