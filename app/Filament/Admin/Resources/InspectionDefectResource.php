<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\InspectionDefect;
use App\Filament\Admin\Resources\InspectionDefectResource\Pages;

class InspectionDefectResource extends GarmentResource
{
    protected static ?string $model = InspectionDefect::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Laboratory';

    protected static ?string $moduleKey = 'lab';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInspectionDefect::route('/'),
            'create' => Pages\CreateInspectionDefect::route('/create'),
            'edit' => Pages\EditInspectionDefect::route('/{record}/edit'),
        ];
    }
}
