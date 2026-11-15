<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HourlyProductionResource\Pages;

use App\Filament\Admin\Resources\HourlyProductionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditHourlyProduction extends EditsGarmentRecord
{
    protected static string $resource = HourlyProductionResource::class;
}
