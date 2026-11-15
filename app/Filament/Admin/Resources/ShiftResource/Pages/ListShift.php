<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ShiftResource\Pages;

use App\Filament\Admin\Resources\ShiftResource;
use App\Filament\Support\ListsGarmentRecords;

class ListShift extends ListsGarmentRecords
{
    protected static string $resource = ShiftResource::class;
}
