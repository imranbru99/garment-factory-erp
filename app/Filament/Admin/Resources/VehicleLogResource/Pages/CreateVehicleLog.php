<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\VehicleLogResource\Pages;

use App\Filament\Admin\Resources\VehicleLogResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateVehicleLog extends CreatesGarmentRecord
{
    protected static string $resource = VehicleLogResource::class;
}
