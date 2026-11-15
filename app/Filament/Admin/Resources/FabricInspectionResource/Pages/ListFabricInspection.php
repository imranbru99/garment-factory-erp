<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FabricInspectionResource\Pages;

use App\Filament\Admin\Resources\FabricInspectionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListFabricInspection extends ListsGarmentRecords
{
    protected static string $resource = FabricInspectionResource::class;
}
