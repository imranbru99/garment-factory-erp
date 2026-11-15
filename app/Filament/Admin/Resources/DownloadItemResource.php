<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\DownloadItem;
use App\Filament\Admin\Resources\DownloadItemResource\Pages;

class DownloadItemResource extends GarmentResource
{
    protected static ?string $model = DownloadItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $moduleKey = 'website';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDownloadItem::route('/'),
            'create' => Pages\CreateDownloadItem::route('/create'),
            'edit' => Pages\EditDownloadItem::route('/{record}/edit'),
        ];
    }
}
