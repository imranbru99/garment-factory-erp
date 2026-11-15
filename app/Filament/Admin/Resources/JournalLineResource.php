<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\JournalLine;
use App\Filament\Admin\Resources\JournalLineResource\Pages;

class JournalLineResource extends GarmentResource
{
    protected static ?string $model = JournalLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJournalLine::route('/'),
            'create' => Pages\CreateJournalLine::route('/create'),
            'edit' => Pages\EditJournalLine::route('/{record}/edit'),
        ];
    }
}
