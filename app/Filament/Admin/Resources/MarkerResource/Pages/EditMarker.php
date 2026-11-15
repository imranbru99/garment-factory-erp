<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MarkerResource\Pages;

use App\Filament\Admin\Resources\MarkerResource;
use App\Filament\Support\EditsGarmentRecord;

class EditMarker extends EditsGarmentRecord
{
    protected static string $resource = MarkerResource::class;
}
