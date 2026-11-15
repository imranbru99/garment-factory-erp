<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\MaintenanceOrder;
use App\Filament\Admin\Resources\MaintenanceOrderResource\Pages;

class MaintenanceOrderResource extends GarmentResource
{
    protected static ?string $model = MaintenanceOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Maintenance';

    protected static ?string $moduleKey = 'maintenance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenanceOrder::route('/'),
            'create' => Pages\CreateMaintenanceOrder::route('/create'),
            'edit' => Pages\EditMaintenanceOrder::route('/{record}/edit'),
        ];
    }
}
