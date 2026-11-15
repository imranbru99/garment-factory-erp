<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InspectionDefectResource\Pages;

use App\Filament\Admin\Resources\InspectionDefectResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateInspectionDefect extends CreatesGarmentRecord
{
    protected static string $resource = InspectionDefectResource::class;
}
