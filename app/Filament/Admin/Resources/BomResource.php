<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Bom;
use App\Filament\Admin\Resources\BomResource\Pages;

class BomResource extends GarmentResource
{
    protected static ?string $model = Bom::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Orders';

    protected static ?string $moduleKey = 'orders';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBom::route('/'),
            'create' => Pages\CreateBom::route('/create'),
            'edit' => Pages\EditBom::route('/{record}/edit'),
        ];
    }
}
