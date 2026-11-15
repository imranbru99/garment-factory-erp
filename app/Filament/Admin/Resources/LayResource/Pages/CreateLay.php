<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LayResource\Pages;

use App\Filament\Admin\Resources\LayResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLay extends CreatesGarmentRecord
{
    protected static string $resource = LayResource::class;
}
