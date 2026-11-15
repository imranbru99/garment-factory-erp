<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineResource\Pages;

use App\Filament\Admin\Resources\LineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLine extends ListsGarmentRecords
{
    protected static string $resource = LineResource::class;
}
