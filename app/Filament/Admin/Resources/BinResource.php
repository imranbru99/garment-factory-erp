<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Bin;
use App\Filament\Admin\Resources\BinResource\Pages;

class BinResource extends GarmentResource
{
    protected static ?string $model = Bin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inventory';

    protected static ?string $moduleKey = 'inventory';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBin::route('/'),
            'create' => Pages\CreateBin::route('/create'),
            'edit' => Pages\EditBin::route('/{record}/edit'),
        ];
    }
}
