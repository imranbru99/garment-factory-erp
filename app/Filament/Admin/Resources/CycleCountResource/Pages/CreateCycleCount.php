<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CycleCountResource\Pages;

use App\Filament\Admin\Resources\CycleCountResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCycleCount extends CreatesGarmentRecord
{
    protected static string $resource = CycleCountResource::class;
}
