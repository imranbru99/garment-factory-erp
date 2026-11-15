<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\IssueTask;
use App\Filament\Admin\Resources\IssueTaskResource\Pages;

class IssueTaskResource extends GarmentResource
{
    protected static ?string $model = IssueTask::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIssueTask::route('/'),
            'create' => Pages\CreateIssueTask::route('/create'),
            'edit' => Pages\EditIssueTask::route('/{record}/edit'),
        ];
    }
}
