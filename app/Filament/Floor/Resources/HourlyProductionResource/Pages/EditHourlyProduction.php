<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\HourlyProductionResource\Pages;

use App\Filament\Floor\Resources\HourlyProductionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditHourlyProduction extends EditsGarmentRecord
{
    protected static string $resource = HourlyProductionResource::class;
}
