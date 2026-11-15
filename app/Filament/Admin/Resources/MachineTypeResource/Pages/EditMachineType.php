<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\MachineTypeResource\Pages;

use App\Filament\Admin\Resources\MachineTypeResource;
use App\Filament\Support\EditsGarmentRecord;

class EditMachineType extends EditsGarmentRecord
{
    protected static string $resource = MachineTypeResource::class;
}
