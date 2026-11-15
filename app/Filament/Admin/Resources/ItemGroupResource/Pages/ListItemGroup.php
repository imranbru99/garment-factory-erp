<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ItemGroupResource\Pages;

use App\Filament\Admin\Resources\ItemGroupResource;
use App\Filament\Support\ListsGarmentRecords;

class ListItemGroup extends ListsGarmentRecords
{
    protected static string $resource = ItemGroupResource::class;
}
