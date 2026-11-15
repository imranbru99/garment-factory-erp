<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Forwarder;
use App\Filament\Admin\Resources\ForwarderResource\Pages;

class ForwarderResource extends GarmentResource
{
    protected static ?string $model = Forwarder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shipping';

    protected static ?string $moduleKey = 'shipping';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForwarder::route('/'),
            'create' => Pages\CreateForwarder::route('/create'),
            'edit' => Pages\EditForwarder::route('/{record}/edit'),
        ];
    }
}
