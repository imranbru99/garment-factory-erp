<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\RfqQuote;
use App\Filament\Admin\Resources\RfqQuoteResource\Pages;

class RfqQuoteResource extends GarmentResource
{
    protected static ?string $model = RfqQuote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRfqQuote::route('/'),
            'create' => Pages\CreateRfqQuote::route('/create'),
            'edit' => Pages\EditRfqQuote::route('/{record}/edit'),
        ];
    }
}
