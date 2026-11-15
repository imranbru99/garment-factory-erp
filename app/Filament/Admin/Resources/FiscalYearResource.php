<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\FiscalYear;
use App\Filament\Admin\Resources\FiscalYearResource\Pages;

class FiscalYearResource extends GarmentResource
{
    protected static ?string $model = FiscalYear::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFiscalYear::route('/'),
            'create' => Pages\CreateFiscalYear::route('/create'),
            'edit' => Pages\EditFiscalYear::route('/{record}/edit'),
        ];
    }
}
