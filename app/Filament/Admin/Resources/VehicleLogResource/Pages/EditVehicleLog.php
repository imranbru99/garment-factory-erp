<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\VehicleLogResource\Pages;

use App\Filament\Admin\Resources\VehicleLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditVehicleLog extends EditsGarmentRecord
{
    protected static string $resource = VehicleLogResource::class;
}
