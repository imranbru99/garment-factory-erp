<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MeasurementAuditResource\Pages;

use App\Filament\Admin\Resources\MeasurementAuditResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMeasurementAudit extends ListsGarmentRecords
{
    protected static string $resource = MeasurementAuditResource::class;
}
