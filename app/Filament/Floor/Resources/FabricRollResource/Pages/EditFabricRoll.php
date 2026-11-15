<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\FabricRollResource\Pages;

use App\Filament\Floor\Resources\FabricRollResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFabricRoll extends EditsGarmentRecord
{
    protected static string $resource = FabricRollResource::class;
}
