<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BuyerContact;
use App\Filament\Admin\Resources\BuyerContactResource\Pages;

class BuyerContactResource extends GarmentResource
{
    protected static ?string $model = BuyerContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyerContact::route('/'),
            'create' => Pages\CreateBuyerContact::route('/create'),
            'edit' => Pages\EditBuyerContact::route('/{record}/edit'),
        ];
    }
}
