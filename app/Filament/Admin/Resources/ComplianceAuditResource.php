<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ComplianceAudit;
use App\Filament\Admin\Resources\ComplianceAuditResource\Pages;

class ComplianceAuditResource extends GarmentResource
{
    protected static ?string $model = ComplianceAudit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Compliance';

    protected static ?string $moduleKey = 'compliance';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComplianceAudit::route('/'),
            'create' => Pages\CreateComplianceAudit::route('/create'),
            'edit' => Pages\EditComplianceAudit::route('/{record}/edit'),
        ];
    }
}
