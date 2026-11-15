<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\ItemGroup;
use App\Filament\Admin\Resources\ItemGroupResource\Pages;

class ItemGroupResource extends GarmentResource
{
    protected static ?string $model = ItemGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItemGroup::route('/'),
            'create' => Pages\CreateItemGroup::route('/create'),
            'edit' => Pages\EditItemGroup::route('/{record}/edit'),
        ];
    }
}
