<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\BillOfEntry;
use App\Filament\Admin\Resources\BillOfEntryResource\Pages;

class BillOfEntryResource extends GarmentResource
{
    protected static ?string $model = BillOfEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBillOfEntry::route('/'),
            'create' => Pages\CreateBillOfEntry::route('/create'),
            'edit' => Pages\EditBillOfEntry::route('/{record}/edit'),
        ];
    }
}
