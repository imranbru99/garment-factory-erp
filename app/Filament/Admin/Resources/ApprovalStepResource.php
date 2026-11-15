<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ApprovalStep;
use App\Filament\Admin\Resources\ApprovalStepResource\Pages;

class ApprovalStepResource extends GarmentResource
{
    protected static ?string $model = ApprovalStep::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApprovalStep::route('/'),
            'create' => Pages\CreateApprovalStep::route('/create'),
            'edit' => Pages\EditApprovalStep::route('/{record}/edit'),
        ];
    }
}
