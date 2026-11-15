<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SeasonResource\Pages;

use App\Filament\Admin\Resources\SeasonResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSeason extends EditsGarmentRecord
{
    protected static string $resource = SeasonResource::class;
}
