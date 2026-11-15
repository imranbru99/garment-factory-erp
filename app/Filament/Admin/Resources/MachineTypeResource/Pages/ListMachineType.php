<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MachineTypeResource\Pages;

use App\Filament\Admin\Resources\MachineTypeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMachineType extends ListsGarmentRecords
{
    protected static string $resource = MachineTypeResource::class;
}
