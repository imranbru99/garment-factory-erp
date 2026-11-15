<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FloorResource\Pages;

use App\Filament\Admin\Resources\FloorResource;
use App\Filament\Support\ListsGarmentRecords;

class ListFloor extends ListsGarmentRecords
{
    protected static string $resource = FloorResource::class;
}
