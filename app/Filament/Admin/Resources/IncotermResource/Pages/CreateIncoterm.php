<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncotermResource\Pages;

use App\Filament\Admin\Resources\IncotermResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateIncoterm extends CreatesGarmentRecord
{
    protected static string $resource = IncotermResource::class;
}
