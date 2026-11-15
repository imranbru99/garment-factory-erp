<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LayResource\Pages;

use App\Filament\Admin\Resources\LayResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLay extends ListsGarmentRecords
{
    protected static string $resource = LayResource::class;
}
