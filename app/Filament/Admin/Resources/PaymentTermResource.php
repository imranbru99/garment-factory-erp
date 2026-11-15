<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PaymentTerm;
use App\Filament\Admin\Resources\PaymentTermResource\Pages;

class PaymentTermResource extends GarmentResource
{
    protected static ?string $model = PaymentTerm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentTerm::route('/'),
            'create' => Pages\CreatePaymentTerm::route('/create'),
            'edit' => Pages\EditPaymentTerm::route('/{record}/edit'),
        ];
    }
}
