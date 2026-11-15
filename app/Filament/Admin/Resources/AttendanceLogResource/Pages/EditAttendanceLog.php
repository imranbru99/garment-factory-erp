<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AttendanceLogResource\Pages;

use App\Filament\Admin\Resources\AttendanceLogResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAttendanceLog extends EditRecord
{
    protected static string $resource = AttendanceLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
