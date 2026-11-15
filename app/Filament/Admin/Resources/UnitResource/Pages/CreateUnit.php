<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\UnitResource\Pages;

use App\Filament\Admin\Resources\UnitResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateUnit extends CreatesGarmentRecord
{
    protected static string $resource = UnitResource::class;
}
