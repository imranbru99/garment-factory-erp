<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BomLine;
use App\Filament\Admin\Resources\BomLineResource\Pages;

class BomLineResource extends GarmentResource
{
    protected static ?string $model = BomLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBomLine::route('/'),
            'create' => Pages\CreateBomLine::route('/create'),
            'edit' => Pages\EditBomLine::route('/{record}/edit'),
        ];
    }
}
