<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AttendanceDeviceResource\Pages;
use ImranDevBd\AttendanceHub\Filament\Resources\AttendanceDeviceResource as HubDeviceResource;

class AttendanceDeviceResource extends HubDeviceResource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendanceDevices::route('/'),
            'create' => Pages\CreateAttendanceDevice::route('/create'),
            'edit' => Pages\EditAttendanceDevice::route('/{record}/edit'),
        ];
    }
}
