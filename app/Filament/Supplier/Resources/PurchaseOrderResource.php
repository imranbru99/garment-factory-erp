<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PurchaseOrder;
use App\Filament\Supplier\Resources\PurchaseOrderResource\Pages;

class PurchaseOrderResource extends GarmentResource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchaseOrder::route('/'),
            'create' => Pages\CreatePurchaseOrder::route('/create'),
            'edit' => Pages\EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
}
