<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Buyer;
use App\Filament\Admin\Resources\BuyerResource\Pages;

class BuyerResource extends GarmentResource
{
    protected static ?string $model = Buyer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyer::route('/'),
            'create' => Pages\CreateBuyer::route('/create'),
            'edit' => Pages\EditBuyer::route('/{record}/edit'),
        ];
    }
}
