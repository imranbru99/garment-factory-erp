<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LedgerAccount;
use App\Filament\Admin\Resources\LedgerAccountResource\Pages;

class LedgerAccountResource extends GarmentResource
{
    protected static ?string $model = LedgerAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLedgerAccount::route('/'),
            'create' => Pages\CreateLedgerAccount::route('/create'),
            'edit' => Pages\EditLedgerAccount::route('/{record}/edit'),
        ];
    }
}
