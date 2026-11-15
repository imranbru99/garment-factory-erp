<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\AuditFinding;
use App\Filament\Admin\Resources\AuditFindingResource\Pages;

class AuditFindingResource extends GarmentResource
{
    protected static ?string $model = AuditFinding::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Compliance';

    protected static ?string $moduleKey = 'compliance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuditFinding::route('/'),
            'create' => Pages\CreateAuditFinding::route('/create'),
            'edit' => Pages\EditAuditFinding::route('/{record}/edit'),
        ];
    }
}
