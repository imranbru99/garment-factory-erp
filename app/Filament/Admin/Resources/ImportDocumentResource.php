<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ImportDocument;
use App\Filament\Admin\Resources\ImportDocumentResource\Pages;

class ImportDocumentResource extends GarmentResource
{
    protected static ?string $model = ImportDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImportDocument::route('/'),
            'create' => Pages\CreateImportDocument::route('/create'),
            'edit' => Pages\EditImportDocument::route('/{record}/edit'),
        ];
    }
}
