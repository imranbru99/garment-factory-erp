<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FactoryMachineResource\Pages;

use App\Filament\Admin\Resources\FactoryMachineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateFactoryMachine extends CreatesGarmentRecord
{
    protected static string $resource = FactoryMachineResource::class;
}
