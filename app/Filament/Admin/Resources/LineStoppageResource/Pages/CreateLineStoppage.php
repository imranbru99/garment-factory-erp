<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineStoppageResource\Pages;

use App\Filament\Admin\Resources\LineStoppageResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLineStoppage extends CreatesGarmentRecord
{
    protected static string $resource = LineStoppageResource::class;
}
