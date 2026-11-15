<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CartonResource\Pages;

use App\Filament\Admin\Resources\CartonResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCarton extends ListsGarmentRecords
{
    protected static string $resource = CartonResource::class;
}
