<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\GatePass;
use App\Filament\Admin\Resources\GatePassResource\Pages;

class GatePassResource extends GarmentResource
{
    protected static ?string $model = GatePass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shipping';

    protected static ?string $moduleKey = 'shipping';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGatePass::route('/'),
            'create' => Pages\CreateGatePass::route('/create'),
            'edit' => Pages\EditGatePass::route('/{record}/edit'),
        ];
    }
}
