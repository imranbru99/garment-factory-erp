<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FactoryMachine;
use App\Filament\Admin\Resources\FactoryMachineResource\Pages;

class FactoryMachineResource extends GarmentResource
{
    protected static ?string $model = FactoryMachine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Maintenance';

    protected static ?string $moduleKey = 'maintenance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactoryMachine::route('/'),
            'create' => Pages\CreateFactoryMachine::route('/create'),
            'edit' => Pages\EditFactoryMachine::route('/{record}/edit'),
        ];
    }
}
