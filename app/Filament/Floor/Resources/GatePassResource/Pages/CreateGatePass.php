<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\GatePassResource\Pages;

use App\Filament\Floor\Resources\GatePassResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateGatePass extends CreatesGarmentRecord
{
    protected static string $resource = GatePassResource::class;
}
