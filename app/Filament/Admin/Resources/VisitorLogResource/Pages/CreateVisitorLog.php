<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\VisitorLogResource\Pages;

use App\Filament\Admin\Resources\VisitorLogResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateVisitorLog extends CreatesGarmentRecord
{
    protected static string $resource = VisitorLogResource::class;
}
