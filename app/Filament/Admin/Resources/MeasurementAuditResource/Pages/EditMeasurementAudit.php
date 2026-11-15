<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MeasurementAuditResource\Pages;

use App\Filament\Admin\Resources\MeasurementAuditResource;
use App\Filament\Support\EditsGarmentRecord;

class EditMeasurementAudit extends EditsGarmentRecord
{
    protected static string $resource = MeasurementAuditResource::class;
}
