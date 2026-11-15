<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\IssueType;
use App\Filament\Admin\Resources\IssueTypeResource\Pages;

class IssueTypeResource extends GarmentResource
{
    protected static ?string $model = IssueType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIssueType::route('/'),
            'create' => Pages\CreateIssueType::route('/create'),
            'edit' => Pages\EditIssueType::route('/{record}/edit'),
        ];
    }
}
