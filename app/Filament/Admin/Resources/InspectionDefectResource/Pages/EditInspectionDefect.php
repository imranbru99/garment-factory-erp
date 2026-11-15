<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InspectionDefectResource\Pages;

use App\Filament\Admin\Resources\InspectionDefectResource;
use App\Filament\Support\EditsGarmentRecord;

class EditInspectionDefect extends EditsGarmentRecord
{
    protected static string $resource = InspectionDefectResource::class;
}
