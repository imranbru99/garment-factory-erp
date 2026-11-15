<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\OrderRevision;
use App\Filament\Admin\Resources\OrderRevisionResource\Pages;

class OrderRevisionResource extends GarmentResource
{
    protected static ?string $model = OrderRevision::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderRevision::route('/'),
            'create' => Pages\CreateOrderRevision::route('/create'),
            'edit' => Pages\EditOrderRevision::route('/{record}/edit'),
        ];
    }
}
