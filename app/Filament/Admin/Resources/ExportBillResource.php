<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ExportBill;
use App\Filament\Admin\Resources\ExportBillResource\Pages;

class ExportBillResource extends GarmentResource
{
    protected static ?string $model = ExportBill::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExportBill::route('/'),
            'create' => Pages\CreateExportBill::route('/create'),
            'edit' => Pages\EditExportBill::route('/{record}/edit'),
        ];
    }
}
