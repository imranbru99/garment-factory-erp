<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\Announcement;
use App\Filament\Employee\Resources\AnnouncementResource\Pages;

class AnnouncementResource extends GarmentResource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Communication';

    protected static ?string $moduleKey = 'communication';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncement::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}
