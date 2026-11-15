<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources\AnnouncementResource\Pages;

use App\Filament\Employee\Resources\AnnouncementResource;
use App\Filament\Support\EditsGarmentRecord;

class EditAnnouncement extends EditsGarmentRecord
{
    protected static string $resource = AnnouncementResource::class;
}
