<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DefectResource\Pages;

use App\Filament\Admin\Resources\DefectResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateDefect extends CreatesGarmentRecord
{
    protected static string $resource = DefectResource::class;
}
