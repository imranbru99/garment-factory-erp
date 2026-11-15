<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineResource\Pages;

use App\Filament\Admin\Resources\LineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLine extends CreatesGarmentRecord
{
    protected static string $resource = LineResource::class;
}
