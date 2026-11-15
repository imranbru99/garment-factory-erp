<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Rfq;
use App\Filament\Admin\Resources\RfqResource\Pages;

class RfqResource extends GarmentResource
{
    protected static ?string $model = Rfq::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRfq::route('/'),
            'create' => Pages\CreateRfq::route('/create'),
            'edit' => Pages\EditRfq::route('/{record}/edit'),
        ];
    }
}
