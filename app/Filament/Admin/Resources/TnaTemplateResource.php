<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\TnaTemplate;
use App\Filament\Admin\Resources\TnaTemplateResource\Pages;

class TnaTemplateResource extends GarmentResource
{
    protected static ?string $model = TnaTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTnaTemplate::route('/'),
            'create' => Pages\CreateTnaTemplate::route('/create'),
            'edit' => Pages\EditTnaTemplate::route('/{record}/edit'),
        ];
    }
}
