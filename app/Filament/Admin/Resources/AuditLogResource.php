<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\AuditLog;
use App\Filament\Admin\Resources\AuditLogResource\Pages;

class AuditLogResource extends GarmentResource
{
    protected static ?string $model = AuditLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuditLog::route('/'),
            'create' => Pages\CreateAuditLog::route('/create'),
            'edit' => Pages\EditAuditLog::route('/{record}/edit'),
        ];
    }
}
