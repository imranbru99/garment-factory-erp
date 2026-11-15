<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Playbook;
use App\Filament\Admin\Resources\PlaybookResource\Pages;

class PlaybookResource extends GarmentResource
{
    protected static ?string $model = Playbook::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Issues';

    protected static ?string $moduleKey = 'issues';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlaybook::route('/'),
            'create' => Pages\CreatePlaybook::route('/create'),
            'edit' => Pages\EditPlaybook::route('/{record}/edit'),
        ];
    }
}
