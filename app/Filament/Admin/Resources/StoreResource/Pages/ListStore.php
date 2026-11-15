<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StoreResource\Pages;

use App\Filament\Admin\Resources\StoreResource;
use App\Filament\Support\ListsGarmentRecords;

class ListStore extends ListsGarmentRecords
{
    protected static string $resource = StoreResource::class;
}
