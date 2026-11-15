<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\IncentiveClaim;
use App\Filament\Admin\Resources\IncentiveClaimResource\Pages;

class IncentiveClaimResource extends GarmentResource
{
    protected static ?string $model = IncentiveClaim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncentiveClaim::route('/'),
            'create' => Pages\CreateIncentiveClaim::route('/create'),
            'edit' => Pages\EditIncentiveClaim::route('/{record}/edit'),
        ];
    }
}
