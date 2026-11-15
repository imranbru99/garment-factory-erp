<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MaintenanceOrderResource\Pages;

use App\Filament\Admin\Resources\MaintenanceOrderResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMaintenanceOrder extends ListsGarmentRecords
{
    protected static string $resource = MaintenanceOrderResource::class;
}
