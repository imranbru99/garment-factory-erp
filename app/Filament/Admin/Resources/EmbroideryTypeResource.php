<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\EmbroideryType;
use App\Filament\Admin\Resources\EmbroideryTypeResource\Pages;

class EmbroideryTypeResource extends GarmentResource
{
    protected static ?string $model = EmbroideryType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Embroidery';

    protected static ?string $moduleKey = 'embroidery';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmbroideryType::route('/'),
            'create' => Pages\CreateEmbroideryType::route('/create'),
            'edit' => Pages\EditEmbroideryType::route('/{record}/edit'),
        ];
    }
}
