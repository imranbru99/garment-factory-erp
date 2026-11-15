<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SupplierInvoice;
use App\Filament\Admin\Resources\SupplierInvoiceResource\Pages;

class SupplierInvoiceResource extends GarmentResource
{
    protected static ?string $model = SupplierInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupplierInvoice::route('/'),
            'create' => Pages\CreateSupplierInvoice::route('/create'),
            'edit' => Pages\EditSupplierInvoice::route('/{record}/edit'),
        ];
    }
}
