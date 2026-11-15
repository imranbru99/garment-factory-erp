<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Claim;
use App\Filament\Buyer\Resources\ClaimResource\Pages;

class ClaimResource extends GarmentResource
{
    protected static ?string $model = Claim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClaim::route('/'),
            'create' => Pages\CreateClaim::route('/create'),
            'edit' => Pages\EditClaim::route('/{record}/edit'),
        ];
    }
}
