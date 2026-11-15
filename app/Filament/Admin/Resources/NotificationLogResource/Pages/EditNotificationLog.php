<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NotificationLogResource\Pages;

use App\Filament\Admin\Resources\NotificationLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditNotificationLog extends EditsGarmentRecord
{
    protected static string $resource = NotificationLogResource::class;
}
