<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\UnitResource\Pages;

use App\Filament\Admin\Resources\UnitResource;
use App\Filament\Support\EditsGarmentRecord;

class EditUnit extends EditsGarmentRecord
{
    protected static string $resource = UnitResource::class;
}
