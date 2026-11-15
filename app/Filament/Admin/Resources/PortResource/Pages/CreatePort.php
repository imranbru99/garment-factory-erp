<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PortResource\Pages;

use App\Filament\Admin\Resources\PortResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePort extends CreatesGarmentRecord
{
    protected static string $resource = PortResource::class;
}
