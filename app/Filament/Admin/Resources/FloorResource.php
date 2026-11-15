<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Floor;
use App\Filament\Admin\Resources\FloorResource\Pages;

class FloorResource extends GarmentResource
{
    protected static ?string $model = Floor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFloor::route('/'),
            'create' => Pages\CreateFloor::route('/create'),
            'edit' => Pages\EditFloor::route('/{record}/edit'),
        ];
    }
}
