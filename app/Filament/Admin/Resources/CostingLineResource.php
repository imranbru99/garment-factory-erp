<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CostingLine;
use App\Filament\Admin\Resources\CostingLineResource\Pages;

class CostingLineResource extends GarmentResource
{
    protected static ?string $model = CostingLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Style & Costing';

    protected static ?string $moduleKey = 'style';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCostingLine::route('/'),
            'create' => Pages\CreateCostingLine::route('/create'),
            'edit' => Pages\EditCostingLine::route('/{record}/edit'),
        ];
    }
}
