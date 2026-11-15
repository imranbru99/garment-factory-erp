<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\JournalEntry;
use App\Filament\Admin\Resources\JournalEntryResource\Pages;

class JournalEntryResource extends GarmentResource
{
    protected static ?string $model = JournalEntry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Accounts';

    protected static ?string $moduleKey = 'accounts';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJournalEntry::route('/'),
            'create' => Pages\CreateJournalEntry::route('/create'),
            'edit' => Pages\EditJournalEntry::route('/{record}/edit'),
        ];
    }
}
