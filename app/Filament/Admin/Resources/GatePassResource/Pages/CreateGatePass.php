<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GatePassResource\Pages;

use App\Filament\Admin\Resources\GatePassResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateGatePass extends CreatesGarmentRecord
{
    protected static string $resource = GatePassResource::class;
}
