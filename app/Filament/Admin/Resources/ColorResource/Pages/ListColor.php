<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ColorResource\Pages;

use App\Filament\Admin\Resources\ColorResource;
use App\Filament\Support\ListsGarmentRecords;

class ListColor extends ListsGarmentRecords
{
    protected static string $resource = ColorResource::class;
}
