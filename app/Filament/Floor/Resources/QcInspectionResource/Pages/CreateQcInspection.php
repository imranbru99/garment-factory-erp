<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\QcInspectionResource\Pages;

use App\Filament\Floor\Resources\QcInspectionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateQcInspection extends CreatesGarmentRecord
{
    protected static string $resource = QcInspectionResource::class;
}
