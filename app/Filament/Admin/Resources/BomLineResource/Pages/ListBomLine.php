<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BomLineResource\Pages;

use App\Filament\Admin\Resources\BomLineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBomLine extends ListsGarmentRecords
{
    protected static string $resource = BomLineResource::class;
}
