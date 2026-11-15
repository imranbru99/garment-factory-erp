<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PurchaseOrderLine;
use App\Filament\Admin\Resources\PurchaseOrderLineResource\Pages;

class PurchaseOrderLineResource extends GarmentResource
{
    protected static ?string $model = PurchaseOrderLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchaseOrderLine::route('/'),
            'create' => Pages\CreatePurchaseOrderLine::route('/create'),
            'edit' => Pages\EditPurchaseOrderLine::route('/{record}/edit'),
        ];
    }
}
