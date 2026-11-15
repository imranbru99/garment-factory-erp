<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\OrderLine;
use App\Filament\Admin\Resources\OrderLineResource\Pages;

class OrderLineResource extends GarmentResource
{
    protected static ?string $model = OrderLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderLine::route('/'),
            'create' => Pages\CreateOrderLine::route('/create'),
            'edit' => Pages\EditOrderLine::route('/{record}/edit'),
        ];
    }
}
