<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemResource\Pages;

use App\Filament\Admin\Resources\ItemResource;
use App\Filament\Support\ListsGarmentRecords;

class ListItem extends ListsGarmentRecords
{
    protected static string $resource = ItemResource::class;
}
