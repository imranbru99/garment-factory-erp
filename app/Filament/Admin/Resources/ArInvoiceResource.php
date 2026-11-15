<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ArInvoice;
use App\Filament\Admin\Resources\ArInvoiceResource\Pages;

class ArInvoiceResource extends GarmentResource
{
    protected static ?string $model = ArInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArInvoice::route('/'),
            'create' => Pages\CreateArInvoice::route('/create'),
            'edit' => Pages\EditArInvoice::route('/{record}/edit'),
        ];
    }
}
