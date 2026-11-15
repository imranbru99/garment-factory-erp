<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ArReceipt;
use App\Filament\Admin\Resources\ArReceiptResource\Pages;

class ArReceiptResource extends GarmentResource
{
    protected static ?string $model = ArReceipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArReceipt::route('/'),
            'create' => Pages\CreateArReceipt::route('/create'),
            'edit' => Pages\EditArReceipt::route('/{record}/edit'),
        ];
    }
}
