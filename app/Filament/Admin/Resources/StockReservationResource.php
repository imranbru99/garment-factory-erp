<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\StockReservation;
use App\Filament\Admin\Resources\StockReservationResource\Pages;

class StockReservationResource extends GarmentResource
{
    protected static ?string $model = StockReservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockReservation::route('/'),
            'create' => Pages\CreateStockReservation::route('/create'),
            'edit' => Pages\EditStockReservation::route('/{record}/edit'),
        ];
    }
}
