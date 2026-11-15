<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FloorResource\Pages;

use App\Filament\Admin\Resources\FloorResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFloor extends EditsGarmentRecord
{
    protected static string $resource = FloorResource::class;
}
