<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\VehicleLog;
use App\Filament\Admin\Resources\VehicleLogResource\Pages;

class VehicleLogResource extends GarmentResource
{
    protected static ?string $model = VehicleLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shipping';

    protected static ?string $moduleKey = 'shipping';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicleLog::route('/'),
            'create' => Pages\CreateVehicleLog::route('/create'),
            'edit' => Pages\EditVehicleLog::route('/{record}/edit'),
        ];
    }
}
