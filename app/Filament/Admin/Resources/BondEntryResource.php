<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BondEntry;
use App\Filament\Admin\Resources\BondEntryResource\Pages;

class BondEntryResource extends GarmentResource
{
    protected static ?string $model = BondEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBondEntry::route('/'),
            'create' => Pages\CreateBondEntry::route('/create'),
            'edit' => Pages\EditBondEntry::route('/{record}/edit'),
        ];
    }
}
