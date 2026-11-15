<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Line;
use App\Filament\Admin\Resources\LineResource\Pages;

class LineResource extends GarmentResource
{
    protected static ?string $model = Line::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLine::route('/'),
            'create' => Pages\CreateLine::route('/create'),
            'edit' => Pages\EditLine::route('/{record}/edit'),
        ];
    }
}
