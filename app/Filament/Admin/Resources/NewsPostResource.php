<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\NewsPost;
use App\Filament\Admin\Resources\NewsPostResource\Pages;

class NewsPostResource extends GarmentResource
{
    protected static ?string $model = NewsPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $moduleKey = 'website';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsPost::route('/'),
            'create' => Pages\CreateNewsPost::route('/create'),
            'edit' => Pages\EditNewsPost::route('/{record}/edit'),
        ];
    }
}
