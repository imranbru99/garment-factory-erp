<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BuyerRequirement;
use App\Filament\Admin\Resources\BuyerRequirementResource\Pages;

class BuyerRequirementResource extends GarmentResource
{
    protected static ?string $model = BuyerRequirement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuyerRequirement::route('/'),
            'create' => Pages\CreateBuyerRequirement::route('/create'),
            'edit' => Pages\EditBuyerRequirement::route('/{record}/edit'),
        ];
    }
}
