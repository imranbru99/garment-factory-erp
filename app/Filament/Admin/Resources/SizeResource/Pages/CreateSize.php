<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SizeResource\Pages;

use App\Filament\Admin\Resources\SizeResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSize extends CreatesGarmentRecord
{
    protected static string $resource = SizeResource::class;
}
