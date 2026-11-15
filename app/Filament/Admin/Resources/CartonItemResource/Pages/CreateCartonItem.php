<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CartonItemResource\Pages;

use App\Filament\Admin\Resources\CartonItemResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCartonItem extends CreatesGarmentRecord
{
    protected static string $resource = CartonItemResource::class;
}
