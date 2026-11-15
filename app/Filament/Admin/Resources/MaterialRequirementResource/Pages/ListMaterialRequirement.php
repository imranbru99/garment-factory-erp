<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MaterialRequirementResource\Pages;

use App\Filament\Admin\Resources\MaterialRequirementResource;
use App\Filament\Support\ListsGarmentRecords;

class ListMaterialRequirement extends ListsGarmentRecords
{
    protected static string $resource = MaterialRequirementResource::class;
}
