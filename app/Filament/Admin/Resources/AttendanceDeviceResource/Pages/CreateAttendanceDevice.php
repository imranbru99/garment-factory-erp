<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AttendanceDeviceResource\Pages;

use App\Filament\Admin\Resources\AttendanceDeviceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendanceDevice extends CreateRecord
{
    protected static string $resource = AttendanceDeviceResource::class;
}
