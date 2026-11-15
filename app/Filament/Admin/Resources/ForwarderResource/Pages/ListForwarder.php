<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ForwarderResource\Pages;

use App\Filament\Admin\Resources\ForwarderResource;
use App\Filament\Support\ListsGarmentRecords;

class ListForwarder extends ListsGarmentRecords
{
    protected static string $resource = ForwarderResource::class;
}
