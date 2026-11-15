<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FabricConstructionResource\Pages;

use App\Filament\Admin\Resources\FabricConstructionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateFabricConstruction extends CreatesGarmentRecord
{
    protected static string $resource = FabricConstructionResource::class;
}
