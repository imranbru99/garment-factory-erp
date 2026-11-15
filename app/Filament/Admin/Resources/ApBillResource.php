<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ApBill;
use App\Filament\Admin\Resources\ApBillResource\Pages;

class ApBillResource extends GarmentResource
{
    protected static ?string $model = ApBill::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApBill::route('/'),
            'create' => Pages\CreateApBill::route('/create'),
            'edit' => Pages\EditApBill::route('/{record}/edit'),
        ];
    }
}
