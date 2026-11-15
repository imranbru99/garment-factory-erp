<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Style;
use App\Filament\Admin\Resources\StyleResource\Pages;

class StyleResource extends GarmentResource
{
    protected static ?string $model = Style::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Style & Costing';

    protected static ?string $moduleKey = 'style';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStyle::route('/'),
            'create' => Pages\CreateStyle::route('/create'),
            'edit' => Pages\EditStyle::route('/{record}/edit'),
        ];
    }
}
