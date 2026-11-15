<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QcInspectionResource\Pages;

use App\Filament\Admin\Resources\QcInspectionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListQcInspection extends ListsGarmentRecords
{
    protected static string $resource = QcInspectionResource::class;
}
