<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\EmbroideryJob;
use App\Filament\Admin\Resources\EmbroideryJobResource\Pages;

class EmbroideryJobResource extends GarmentResource
{
    protected static ?string $model = EmbroideryJob::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Embroidery';

    protected static ?string $moduleKey = 'embroidery';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmbroideryJob::route('/'),
            'create' => Pages\CreateEmbroideryJob::route('/create'),
            'edit' => Pages\EditEmbroideryJob::route('/{record}/edit'),
        ];
    }
}
