<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashTypeResource\Pages;

use App\Filament\Admin\Resources\WashTypeResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateWashType extends CreatesGarmentRecord
{
    protected static string $resource = WashTypeResource::class;
}
