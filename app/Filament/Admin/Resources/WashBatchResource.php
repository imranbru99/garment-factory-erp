<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\WashBatch;
use App\Filament\Admin\Resources\WashBatchResource\Pages;

class WashBatchResource extends GarmentResource
{
    protected static ?string $model = WashBatch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Wash';

    protected static ?string $moduleKey = 'wash';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWashBatch::route('/'),
            'create' => Pages\CreateWashBatch::route('/create'),
            'edit' => Pages\EditWashBatch::route('/{record}/edit'),
        ];
    }
}
