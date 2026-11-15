<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EmbroideryJobResource\Pages;

use App\Filament\Admin\Resources\EmbroideryJobResource;
use App\Filament\Support\EditsGarmentRecord;

class EditEmbroideryJob extends EditsGarmentRecord
{
    protected static string $resource = EmbroideryJobResource::class;
}
