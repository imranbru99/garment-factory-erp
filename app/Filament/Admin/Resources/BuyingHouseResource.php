<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BuyingHouse;
use App\Filament\Admin\Resources\BuyingHouseResource\Pages;

class BuyingHouseResource extends GarmentResource
{
    protected static ?string $model = BuyingHouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyingHouse::route('/'),
            'create' => Pages\CreateBuyingHouse::route('/create'),
            'edit' => Pages\EditBuyingHouse::route('/{record}/edit'),
        ];
    }
}
