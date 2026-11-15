<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AttendanceLogResource\Pages;
use ImranDevBd\AttendanceHub\Filament\Resources\AttendanceLogResource as HubLogResource;

class AttendanceLogResource extends HubLogResource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendanceLogs::route('/'),
            'create' => Pages\CreateAttendanceLog::route('/create'),
            'edit' => Pages\EditAttendanceLog::route('/{record}/edit'),
        ];
    }
}
