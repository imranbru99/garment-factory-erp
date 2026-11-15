<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ObLine;
use App\Filament\Admin\Resources\ObLineResource\Pages;

class ObLineResource extends GarmentResource
{
    protected static ?string $model = ObLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListObLine::route('/'),
            'create' => Pages\CreateObLine::route('/create'),
            'edit' => Pages\EditObLine::route('/{record}/edit'),
        ];
    }
}
