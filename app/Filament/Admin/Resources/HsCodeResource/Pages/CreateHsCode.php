<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HsCodeResource\Pages;

use App\Filament\Admin\Resources\HsCodeResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateHsCode extends CreatesGarmentRecord
{
    protected static string $resource = HsCodeResource::class;
}
