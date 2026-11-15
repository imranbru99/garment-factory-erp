<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Incident;
use App\Filament\Admin\Resources\IncidentResource\Pages;

class IncidentResource extends GarmentResource
{
    protected static ?string $model = Incident::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Compliance';

    protected static ?string $moduleKey = 'compliance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncident::route('/'),
            'create' => Pages\CreateIncident::route('/create'),
            'edit' => Pages\EditIncident::route('/{record}/edit'),
        ];
    }
}
