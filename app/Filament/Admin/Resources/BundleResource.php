<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Bundle;
use App\Filament\Admin\Resources\BundleResource\Pages;

class BundleResource extends GarmentResource
{
    protected static ?string $model = Bundle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Cutting';

    protected static ?string $moduleKey = 'cutting';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBundle::route('/'),
            'create' => Pages\CreateBundle::route('/create'),
            'edit' => Pages\EditBundle::route('/{record}/edit'),
        ];
    }
}
