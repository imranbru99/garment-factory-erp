<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Shipment;
use App\Filament\Buyer\Resources\ShipmentResource\Pages;

class ShipmentResource extends GarmentResource
{
    protected static ?string $model = Shipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shipping';

    protected static ?string $moduleKey = 'shipping';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShipment::route('/'),
            'create' => Pages\CreateShipment::route('/create'),
            'edit' => Pages\EditShipment::route('/{record}/edit'),
        ];
    }
}
