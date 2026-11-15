<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\InspectionDefectResource\Pages;

use App\Filament\Admin\Resources\InspectionDefectResource;
use App\Filament\Support\ListsGarmentRecords;

class ListInspectionDefect extends ListsGarmentRecords
{
    protected static string $resource = InspectionDefectResource::class;
}
