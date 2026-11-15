<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\AppSettingResource\Pages;

use App\Filament\Admin\Resources\AppSettingResource;
use App\Filament\Support\EditsGarmentRecord;

class EditAppSetting extends EditsGarmentRecord
{
    protected static string $resource = AppSettingResource::class;
}
