<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MaintenanceOrderResource\Pages;

use App\Filament\Admin\Resources\MaintenanceOrderResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateMaintenanceOrder extends CreatesGarmentRecord
{
    protected static string $resource = MaintenanceOrderResource::class;
}
