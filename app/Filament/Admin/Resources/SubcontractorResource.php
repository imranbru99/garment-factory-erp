<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Subcontractor;
use App\Filament\Admin\Resources\SubcontractorResource\Pages;

class SubcontractorResource extends GarmentResource
{
    protected static ?string $model = Subcontractor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Procurement';

    protected static ?string $moduleKey = 'procurement';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubcontractor::route('/'),
            'create' => Pages\CreateSubcontractor::route('/create'),
            'edit' => Pages\EditSubcontractor::route('/{record}/edit'),
        ];
    }
}
