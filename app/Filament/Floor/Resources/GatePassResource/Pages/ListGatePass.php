<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\GatePassResource\Pages;

use App\Filament\Floor\Resources\GatePassResource;
use App\Filament\Support\ListsGarmentRecords;

class ListGatePass extends ListsGarmentRecords
{
    protected static string $resource = GatePassResource::class;
}
