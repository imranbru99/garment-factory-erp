<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CycleCountResource\Pages;

use App\Filament\Admin\Resources\CycleCountResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCycleCount extends ListsGarmentRecords
{
    protected static string $resource = CycleCountResource::class;
}
