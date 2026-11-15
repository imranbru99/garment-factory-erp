<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MeasurementPointResource\Pages;

use App\Filament\Admin\Resources\MeasurementPointResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMeasurementPoint extends ListsGarmentRecords
{
    protected static string $resource = MeasurementPointResource::class;
}
