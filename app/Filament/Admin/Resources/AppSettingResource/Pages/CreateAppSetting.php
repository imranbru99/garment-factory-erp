<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AppSettingResource\Pages;

use App\Filament\Admin\Resources\AppSettingResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateAppSetting extends CreatesGarmentRecord
{
    protected static string $resource = AppSettingResource::class;
}
