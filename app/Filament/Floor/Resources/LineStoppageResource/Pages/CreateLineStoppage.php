<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\LineStoppageResource\Pages;

use App\Filament\Floor\Resources\LineStoppageResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLineStoppage extends CreatesGarmentRecord
{
    protected static string $resource = LineStoppageResource::class;
}
