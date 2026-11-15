<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RealizationResource\Pages;

use App\Filament\Admin\Resources\RealizationResource;
use App\Filament\Support\ListsGarmentRecords;

class ListRealization extends ListsGarmentRecords
{
    protected static string $resource = RealizationResource::class;
}
