<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\CommercialInvoice;
use App\Filament\Admin\Resources\CommercialInvoiceResource\Pages;

class CommercialInvoiceResource extends GarmentResource
{
    protected static ?string $model = CommercialInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommercialInvoice::route('/'),
            'create' => Pages\CreateCommercialInvoice::route('/create'),
            'edit' => Pages\EditCommercialInvoice::route('/{record}/edit'),
        ];
    }
}
