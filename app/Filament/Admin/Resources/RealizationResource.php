<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Realization;
use App\Filament\Admin\Resources\RealizationResource\Pages;

class RealizationResource extends GarmentResource
{
    protected static ?string $model = Realization::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commercial';

    protected static ?string $moduleKey = 'commercial';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRealization::route('/'),
            'create' => Pages\CreateRealization::route('/create'),
            'edit' => Pages\EditRealization::route('/{record}/edit'),
        ];
    }
}
