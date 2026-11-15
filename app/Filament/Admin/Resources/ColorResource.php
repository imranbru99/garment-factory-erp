<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Color;
use App\Filament\Admin\Resources\ColorResource\Pages;

class ColorResource extends GarmentResource
{
    protected static ?string $model = Color::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColor::route('/'),
            'create' => Pages\CreateColor::route('/create'),
            'edit' => Pages\EditColor::route('/{record}/edit'),
        ];
    }
}
