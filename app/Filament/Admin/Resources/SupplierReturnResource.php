<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SupplierReturn;
use App\Filament\Admin\Resources\SupplierReturnResource\Pages;

class SupplierReturnResource extends GarmentResource
{
    protected static ?string $model = SupplierReturn::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupplierReturn::route('/'),
            'create' => Pages\CreateSupplierReturn::route('/create'),
            'edit' => Pages\EditSupplierReturn::route('/{record}/edit'),
        ];
    }
}
