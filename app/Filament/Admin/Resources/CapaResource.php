<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Capa;
use App\Filament\Admin\Resources\CapaResource\Pages;

class CapaResource extends GarmentResource
{
    protected static ?string $model = Capa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCapa::route('/'),
            'create' => Pages\CreateCapa::route('/create'),
            'edit' => Pages\EditCapa::route('/{record}/edit'),
        ];
    }
}
