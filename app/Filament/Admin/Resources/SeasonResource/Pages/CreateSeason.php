<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SeasonResource\Pages;

use App\Filament\Admin\Resources\SeasonResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSeason extends CreatesGarmentRecord
{
    protected static string $resource = SeasonResource::class;
}
