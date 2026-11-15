<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ModuleSettingResource\Pages;

use App\Filament\Admin\Resources\ModuleSettingResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateModuleSetting extends CreatesGarmentRecord
{
    protected static string $resource = ModuleSettingResource::class;
}
