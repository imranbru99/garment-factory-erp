<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Season;
use App\Filament\Admin\Resources\SeasonResource\Pages;

class SeasonResource extends GarmentResource
{
    protected static ?string $model = Season::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeason::route('/'),
            'create' => Pages\CreateSeason::route('/create'),
            'edit' => Pages\EditSeason::route('/{record}/edit'),
        ];
    }
}
