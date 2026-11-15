<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Port;
use App\Filament\Admin\Resources\PortResource\Pages;

class PortResource extends GarmentResource
{
    protected static ?string $model = Port::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPort::route('/'),
            'create' => Pages\CreatePort::route('/create'),
            'edit' => Pages\EditPort::route('/{record}/edit'),
        ];
    }
}
