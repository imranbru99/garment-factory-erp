<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StrikeOffResource\Pages;

use App\Filament\Admin\Resources\StrikeOffResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateStrikeOff extends CreatesGarmentRecord
{
    protected static string $resource = StrikeOffResource::class;
}
