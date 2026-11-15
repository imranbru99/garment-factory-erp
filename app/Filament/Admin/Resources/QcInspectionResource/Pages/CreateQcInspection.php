<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QcInspectionResource\Pages;

use App\Filament\Admin\Resources\QcInspectionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateQcInspection extends CreatesGarmentRecord
{
    protected static string $resource = QcInspectionResource::class;
}
