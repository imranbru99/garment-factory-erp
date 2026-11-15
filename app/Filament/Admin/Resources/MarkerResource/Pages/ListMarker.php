<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MarkerResource\Pages;

use App\Filament\Admin\Resources\MarkerResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMarker extends ListsGarmentRecords
{
    protected static string $resource = MarkerResource::class;
}
