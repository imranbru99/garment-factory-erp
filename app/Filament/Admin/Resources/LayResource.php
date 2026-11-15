<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Lay;
use App\Filament\Admin\Resources\LayResource\Pages;

class LayResource extends GarmentResource
{
    protected static ?string $model = Lay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Cutting';

    protected static ?string $moduleKey = 'cutting';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLay::route('/'),
            'create' => Pages\CreateLay::route('/create'),
            'edit' => Pages\EditLay::route('/{record}/edit'),
        ];
    }
}
