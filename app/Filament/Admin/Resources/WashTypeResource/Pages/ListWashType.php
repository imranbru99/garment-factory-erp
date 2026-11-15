<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashTypeResource\Pages;

use App\Filament\Admin\Resources\WashTypeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListWashType extends ListsGarmentRecords
{
    protected static string $resource = WashTypeResource::class;
}
