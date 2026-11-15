<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ProformaInvoice;
use App\Filament\Admin\Resources\ProformaInvoiceResource\Pages;

class ProformaInvoiceResource extends GarmentResource
{
    protected static ?string $model = ProformaInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProformaInvoice::route('/'),
            'create' => Pages\CreateProformaInvoice::route('/create'),
            'edit' => Pages\EditProformaInvoice::route('/{record}/edit'),
        ];
    }
}
