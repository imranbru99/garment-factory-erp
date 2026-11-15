<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AttendanceDeviceResource\Pages;

use App\Filament\Admin\Resources\AttendanceDeviceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAttendanceDevices extends ListRecords
{
    protected static string $resource = AttendanceDeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
