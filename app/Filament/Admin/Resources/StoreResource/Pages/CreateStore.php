<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StoreResource\Pages;

use App\Filament\Admin\Resources\StoreResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateStore extends CreatesGarmentRecord
{
    protected static string $resource = StoreResource::class;
}
