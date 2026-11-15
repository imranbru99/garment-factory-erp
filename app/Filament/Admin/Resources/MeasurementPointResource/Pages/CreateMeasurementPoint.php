<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MeasurementPointResource\Pages;

use App\Filament\Admin\Resources\MeasurementPointResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateMeasurementPoint extends CreatesGarmentRecord
{
    protected static string $resource = MeasurementPointResource::class;
}
