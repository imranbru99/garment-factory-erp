<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AnnouncementResource\Pages;

use App\Filament\Admin\Resources\AnnouncementResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateAnnouncement extends CreatesGarmentRecord
{
    protected static string $resource = AnnouncementResource::class;
}
