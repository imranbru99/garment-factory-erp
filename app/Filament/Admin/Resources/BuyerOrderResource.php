<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BuyerOrder;
use App\Filament\Admin\Resources\BuyerOrderResource\Pages;

class BuyerOrderResource extends GarmentResource
{
    protected static ?string $model = BuyerOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyerOrder::route('/'),
            'create' => Pages\CreateBuyerOrder::route('/create'),
            'edit' => Pages\EditBuyerOrder::route('/{record}/edit'),
        ];
    }
}
