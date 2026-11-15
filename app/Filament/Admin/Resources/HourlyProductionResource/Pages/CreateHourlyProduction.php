<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HourlyProductionResource\Pages;

use App\Filament\Admin\Resources\HourlyProductionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateHourlyProduction extends CreatesGarmentRecord
{
    protected static string $resource = HourlyProductionResource::class;
}
