<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Support\GarmentResource;
use App\Models\NotificationLog;
use App\Filament\Admin\Resources\NotificationLogResource\Pages;

class NotificationLogResource extends GarmentResource
{
    protected static ?string $model = NotificationLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $moduleKey = 'foundation';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotificationLog::route('/'),
            'create' => Pages\CreateNotificationLog::route('/create'),
            'edit' => Pages\EditNotificationLog::route('/{record}/edit'),
        ];
    }
}
