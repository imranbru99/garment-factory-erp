<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\StockBalance;
use App\Filament\Admin\Resources\StockBalanceResource\Pages;

class StockBalanceResource extends GarmentResource
{
    protected static ?string $model = StockBalance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockBalance::route('/'),
            'create' => Pages\CreateStockBalance::route('/create'),
            'edit' => Pages\EditStockBalance::route('/{record}/edit'),
        ];
    }
}
