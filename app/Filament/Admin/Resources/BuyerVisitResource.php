<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BuyerVisit;
use App\Filament\Admin\Resources\BuyerVisitResource\Pages;

class BuyerVisitResource extends GarmentResource
{
    protected static ?string $model = BuyerVisit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyerVisit::route('/'),
            'create' => Pages\CreateBuyerVisit::route('/create'),
            'edit' => Pages\EditBuyerVisit::route('/{record}/edit'),
        ];
    }
}
