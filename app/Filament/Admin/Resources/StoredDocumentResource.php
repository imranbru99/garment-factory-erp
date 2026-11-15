<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\StoredDocument;
use App\Filament\Admin\Resources\StoredDocumentResource\Pages;

class StoredDocumentResource extends GarmentResource
{
    protected static ?string $model = StoredDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoredDocument::route('/'),
            'create' => Pages\CreateStoredDocument::route('/create'),
            'edit' => Pages\EditStoredDocument::route('/{record}/edit'),
        ];
    }
}
