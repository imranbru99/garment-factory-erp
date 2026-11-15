<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FabricRollResource\Pages;

use App\Filament\Admin\Resources\FabricRollResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFabricRoll extends EditsGarmentRecord
{
    protected static string $resource = FabricRollResource::class;
}
