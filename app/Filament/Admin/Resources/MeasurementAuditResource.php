<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\MeasurementAudit;
use App\Filament\Admin\Resources\MeasurementAuditResource\Pages;

class MeasurementAuditResource extends GarmentResource
{
    protected static ?string $model = MeasurementAudit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quality';

    protected static ?string $moduleKey = 'quality';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeasurementAudit::route('/'),
            'create' => Pages\CreateMeasurementAudit::route('/create'),
            'edit' => Pages\EditMeasurementAudit::route('/{record}/edit'),
        ];
    }
}
