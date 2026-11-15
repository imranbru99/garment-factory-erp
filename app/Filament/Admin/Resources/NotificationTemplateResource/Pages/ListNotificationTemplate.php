<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NotificationTemplateResource\Pages;

use App\Filament\Admin\Resources\NotificationTemplateResource;
use App\Filament\Support\ListsGarmentRecords;

class ListNotificationTemplate extends ListsGarmentRecords
{
    protected static string $resource = NotificationTemplateResource::class;
}
