<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SeasonResource\Pages;

use App\Filament\Admin\Resources\SeasonResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSeason extends ListsGarmentRecords
{
    protected static string $resource = SeasonResource::class;
}
