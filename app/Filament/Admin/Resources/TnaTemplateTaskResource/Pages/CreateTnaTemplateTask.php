<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TnaTemplateTaskResource\Pages;

use App\Filament\Admin\Resources\TnaTemplateTaskResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateTnaTemplateTask extends CreatesGarmentRecord
{
    protected static string $resource = TnaTemplateTaskResource::class;
}
