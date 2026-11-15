<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncidentResource\Pages;

use App\Filament\Admin\Resources\IncidentResource;
use App\Filament\Support\ListsGarmentRecords;

class ListIncident extends ListsGarmentRecords
{
    protected static string $resource = IncidentResource::class;
}
