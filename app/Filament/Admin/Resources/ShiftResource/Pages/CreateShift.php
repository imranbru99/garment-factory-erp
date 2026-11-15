<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ShiftResource\Pages;

use App\Filament\Admin\Resources\ShiftResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateShift extends CreatesGarmentRecord
{
    protected static string $resource = ShiftResource::class;
}
