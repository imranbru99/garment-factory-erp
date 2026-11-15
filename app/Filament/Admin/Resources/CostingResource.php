<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Costing;
use App\Filament\Admin\Resources\CostingResource\Pages;

class CostingResource extends GarmentResource
{
    protected static ?string $model = Costing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Style & Costing';

    protected static ?string $moduleKey = 'style';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCosting::route('/'),
            'create' => Pages\CreateCosting::route('/create'),
            'edit' => Pages\EditCosting::route('/{record}/edit'),
        ];
    }
}
