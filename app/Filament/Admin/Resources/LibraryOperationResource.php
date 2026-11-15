<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\LibraryOperation;
use App\Filament\Admin\Resources\LibraryOperationResource\Pages;

class LibraryOperationResource extends GarmentResource
{
    protected static ?string $model = LibraryOperation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sewing';

    protected static ?string $moduleKey = 'sewing';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLibraryOperation::route('/'),
            'create' => Pages\CreateLibraryOperation::route('/create'),
            'edit' => Pages\EditLibraryOperation::route('/{record}/edit'),
        ];
    }
}
