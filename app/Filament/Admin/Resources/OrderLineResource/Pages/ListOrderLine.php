<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OrderLineResource\Pages;

use App\Filament\Admin\Resources\OrderLineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListOrderLine extends ListsGarmentRecords
{
    protected static string $resource = OrderLineResource::class;
}
