<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Negotiation;
use App\Filament\Admin\Resources\NegotiationResource\Pages;

class NegotiationResource extends GarmentResource
{
    protected static ?string $model = Negotiation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $moduleKey = 'marketing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNegotiation::route('/'),
            'create' => Pages\CreateNegotiation::route('/create'),
            'edit' => Pages\EditNegotiation::route('/{record}/edit'),
        ];
    }
}
