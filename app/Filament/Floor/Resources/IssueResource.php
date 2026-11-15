<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Issue;
use App\Filament\Floor\Resources\IssueResource\Pages;

class IssueResource extends GarmentResource
{
    protected static ?string $model = Issue::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIssue::route('/'),
            'create' => Pages\CreateIssue::route('/create'),
            'edit' => Pages\EditIssue::route('/{record}/edit'),
        ];
    }
}
