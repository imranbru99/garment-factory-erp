<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GatePassResource\Pages;

use App\Filament\Admin\Resources\GatePassResource;
use App\Filament\Support\EditsGarmentRecord;

class EditGatePass extends EditsGarmentRecord
{
    protected static string $resource = GatePassResource::class;
}
