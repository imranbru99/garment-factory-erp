<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PortResource\Pages;

use App\Filament\Admin\Resources\PortResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPort extends ListsGarmentRecords
{
    protected static string $resource = PortResource::class;
}
