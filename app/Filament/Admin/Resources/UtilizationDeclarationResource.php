<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\UtilizationDeclaration;
use App\Filament\Admin\Resources\UtilizationDeclarationResource\Pages;

class UtilizationDeclarationResource extends GarmentResource
{
    protected static ?string $model = UtilizationDeclaration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUtilizationDeclaration::route('/'),
            'create' => Pages\CreateUtilizationDeclaration::route('/create'),
            'edit' => Pages\EditUtilizationDeclaration::route('/{record}/edit'),
        ];
    }
}
