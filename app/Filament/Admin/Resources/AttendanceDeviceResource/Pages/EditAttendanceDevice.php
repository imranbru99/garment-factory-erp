<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AttendanceDeviceResource\Pages;

use App\Filament\Admin\Resources\AttendanceDeviceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAttendanceDevice extends EditRecord
{
    protected static string $resource = AttendanceDeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
