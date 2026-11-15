<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CycleCount;
use App\Filament\Admin\Resources\CycleCountResource\Pages;

class CycleCountResource extends GarmentResource
{
    protected static ?string $model = CycleCount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCycleCount::route('/'),
            'create' => Pages\CreateCycleCount::route('/create'),
            'edit' => Pages\EditCycleCount::route('/{record}/edit'),
        ];
    }
}
