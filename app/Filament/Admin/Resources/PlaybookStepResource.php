<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\PlaybookStep;
use App\Filament\Admin\Resources\PlaybookStepResource\Pages;

class PlaybookStepResource extends GarmentResource
{
    protected static ?string $model = PlaybookStep::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlaybookStep::route('/'),
            'create' => Pages\CreatePlaybookStep::route('/create'),
            'edit' => Pages\EditPlaybookStep::route('/{record}/edit'),
        ];
    }
}
