<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LabDipResource\Pages;

use App\Filament\Admin\Resources\LabDipResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLabDip extends CreatesGarmentRecord
{
    protected static string $resource = LabDipResource::class;
}
