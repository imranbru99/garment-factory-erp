<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ObLineResource\Pages;

use App\Filament\Admin\Resources\ObLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateObLine extends CreatesGarmentRecord
{
    protected static string $resource = ObLineResource::class;
}
