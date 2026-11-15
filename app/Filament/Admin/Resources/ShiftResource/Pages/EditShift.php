<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ShiftResource\Pages;

use App\Filament\Admin\Resources\ShiftResource;
use App\Filament\Support\EditsGarmentRecord;

class EditShift extends EditsGarmentRecord
{
    protected static string $resource = ShiftResource::class;
}
