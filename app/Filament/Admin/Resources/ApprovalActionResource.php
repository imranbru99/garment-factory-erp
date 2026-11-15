<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ApprovalAction;
use App\Filament\Admin\Resources\ApprovalActionResource\Pages;

class ApprovalActionResource extends GarmentResource
{
    protected static ?string $model = ApprovalAction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApprovalAction::route('/'),
            'create' => Pages\CreateApprovalAction::route('/create'),
            'edit' => Pages\EditApprovalAction::route('/{record}/edit'),
        ];
    }
}
