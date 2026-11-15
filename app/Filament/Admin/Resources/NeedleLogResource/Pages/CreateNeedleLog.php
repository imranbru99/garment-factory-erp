<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NeedleLogResource\Pages;

use App\Filament\Admin\Resources\NeedleLogResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateNeedleLog extends CreatesGarmentRecord
{
    protected static string $resource = NeedleLogResource::class;
}
