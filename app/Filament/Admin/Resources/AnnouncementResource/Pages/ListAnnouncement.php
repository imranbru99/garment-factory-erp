<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AnnouncementResource\Pages;

use App\Filament\Admin\Resources\AnnouncementResource;
use App\Filament\Support\ListsGarmentRecords;

class ListAnnouncement extends ListsGarmentRecords
{
    protected static string $resource = AnnouncementResource::class;
}
