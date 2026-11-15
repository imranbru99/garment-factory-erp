<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\HsCode;
use App\Filament\Admin\Resources\HsCodeResource\Pages;

class HsCodeResource extends GarmentResource
{
    protected static ?string $model = HsCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHsCode::route('/'),
            'create' => Pages\CreateHsCode::route('/create'),
            'edit' => Pages\EditHsCode::route('/{record}/edit'),
        ];
    }
}
