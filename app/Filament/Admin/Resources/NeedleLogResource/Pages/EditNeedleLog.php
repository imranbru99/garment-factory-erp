<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NeedleLogResource\Pages;

use App\Filament\Admin\Resources\NeedleLogResource;
use App\Filament\Support\EditsGarmentRecord;

class EditNeedleLog extends EditsGarmentRecord
{
    protected static string $resource = NeedleLogResource::class;
}
