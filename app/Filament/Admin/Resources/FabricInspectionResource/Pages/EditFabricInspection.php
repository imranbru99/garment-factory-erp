<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FabricInspectionResource\Pages;

use App\Filament\Admin\Resources\FabricInspectionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFabricInspection extends EditsGarmentRecord
{
    protected static string $resource = FabricInspectionResource::class;
}
