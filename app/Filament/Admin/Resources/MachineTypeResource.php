<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\MachineType;
use App\Filament\Admin\Resources\MachineTypeResource\Pages;

class MachineTypeResource extends GarmentResource
{
    protected static ?string $model = MachineType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Maintenance';

    protected static ?string $moduleKey = 'maintenance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMachineType::route('/'),
            'create' => Pages\CreateMachineType::route('/create'),
            'edit' => Pages\EditMachineType::route('/{record}/edit'),
        ];
    }
}
