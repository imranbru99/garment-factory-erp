<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\QcInspectionResource\Pages;

use App\Filament\Floor\Resources\QcInspectionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListQcInspection extends ListsGarmentRecords
{
    protected static string $resource = QcInspectionResource::class;
}
