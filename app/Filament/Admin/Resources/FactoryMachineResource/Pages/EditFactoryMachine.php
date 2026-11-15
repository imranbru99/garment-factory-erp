<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FactoryMachineResource\Pages;

use App\Filament\Admin\Resources\FactoryMachineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditFactoryMachine extends EditsGarmentRecord
{
    protected static string $resource = FactoryMachineResource::class;
}
