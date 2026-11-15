<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BinResource\Pages;

use App\Filament\Admin\Resources\BinResource;
use App\Filament\Support\ListsGarmentRecords;

class ListBin extends ListsGarmentRecords
{
    protected static string $resource = BinResource::class;
}
