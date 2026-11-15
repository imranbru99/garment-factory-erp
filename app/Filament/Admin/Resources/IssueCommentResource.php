<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\IssueComment;
use App\Filament\Admin\Resources\IssueCommentResource\Pages;

class IssueCommentResource extends GarmentResource
{
    protected static ?string $model = IssueComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIssueComment::route('/'),
            'create' => Pages\CreateIssueComment::route('/create'),
            'edit' => Pages\EditIssueComment::route('/{record}/edit'),
        ];
    }
}
