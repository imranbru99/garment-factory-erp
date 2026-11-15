<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RealizationResource\Pages;

use App\Filament\Admin\Resources\RealizationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateRealization extends CreatesGarmentRecord
{
    protected static string $resource = RealizationResource::class;
}
