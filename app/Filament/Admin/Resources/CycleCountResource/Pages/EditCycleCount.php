<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CycleCountResource\Pages;

use App\Filament\Admin\Resources\CycleCountResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCycleCount extends EditsGarmentRecord
{
    protected static string $resource = CycleCountResource::class;
}
