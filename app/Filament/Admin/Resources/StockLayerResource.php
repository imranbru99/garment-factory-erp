<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\StockLayer;
use App\Filament\Admin\Resources\StockLayerResource\Pages;

class StockLayerResource extends GarmentResource
{
    protected static ?string $model = StockLayer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockLayer::route('/'),
            'create' => Pages\CreateStockLayer::route('/create'),
            'edit' => Pages\EditStockLayer::route('/{record}/edit'),
        ];
    }
}
