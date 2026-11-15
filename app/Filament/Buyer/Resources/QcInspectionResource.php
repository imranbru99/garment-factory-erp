<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\QcInspection;
use App\Filament\Buyer\Resources\QcInspectionResource\Pages;

class QcInspectionResource extends GarmentResource
{
    protected static ?string $model = QcInspection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQcInspection::route('/'),
            'create' => Pages\CreateQcInspection::route('/create'),
            'edit' => Pages\EditQcInspection::route('/{record}/edit'),
        ];
    }
}
