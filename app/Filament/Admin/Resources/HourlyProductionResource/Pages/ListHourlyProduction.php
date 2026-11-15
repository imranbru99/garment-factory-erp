<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HourlyProductionResource\Pages;

use App\Filament\Admin\Resources\HourlyProductionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListHourlyProduction extends ListsGarmentRecords
{
    protected static string $resource = HourlyProductionResource::class;
}
