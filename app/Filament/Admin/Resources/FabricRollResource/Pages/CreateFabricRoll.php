<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FabricRollResource\Pages;

use App\Filament\Admin\Resources\FabricRollResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateFabricRoll extends CreatesGarmentRecord
{
    protected static string $resource = FabricRollResource::class;
}
