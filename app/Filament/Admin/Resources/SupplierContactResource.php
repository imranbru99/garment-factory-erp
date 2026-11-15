<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SupplierContact;
use App\Filament\Admin\Resources\SupplierContactResource\Pages;

class SupplierContactResource extends GarmentResource
{
    protected static ?string $model = SupplierContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupplierContact::route('/'),
            'create' => Pages\CreateSupplierContact::route('/create'),
            'edit' => Pages\EditSupplierContact::route('/{record}/edit'),
        ];
    }
}
