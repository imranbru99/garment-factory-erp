<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\UtilityLogResource\Pages;

use App\Filament\Admin\Resources\UtilityLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditUtilityLog extends EditsGarmentRecord
{
    protected static string $resource = UtilityLogResource::class;
}
