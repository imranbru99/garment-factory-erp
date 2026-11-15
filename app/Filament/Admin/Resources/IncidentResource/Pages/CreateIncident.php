<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncidentResource\Pages;

use App\Filament\Admin\Resources\IncidentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIncident extends CreatesGarmentRecord
{
    protected static string $resource = IncidentResource::class;
}
