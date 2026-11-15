<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\SizeGroup;
use App\Filament\Admin\Resources\SizeGroupResource\Pages;

class SizeGroupResource extends GarmentResource
{
    protected static ?string $model = SizeGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $moduleKey = 'master';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSizeGroup::route('/'),
            'create' => Pages\CreateSizeGroup::route('/create'),
            'edit' => Pages\EditSizeGroup::route('/{record}/edit'),
        ];
    }
}
