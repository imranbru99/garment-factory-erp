<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\LineStoppageResource\Pages;

use App\Filament\Floor\Resources\LineStoppageResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLineStoppage extends ListsGarmentRecords
{
    protected static string $resource = LineStoppageResource::class;
}
