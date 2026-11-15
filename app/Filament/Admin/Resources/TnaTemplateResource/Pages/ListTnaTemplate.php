<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\TnaTemplateResource\Pages;

use App\Filament\Admin\Resources\TnaTemplateResource;
use App\Filament\Support\ListsGarmentRecords;

class ListTnaTemplate extends ListsGarmentRecords
{
    protected static string $resource = TnaTemplateResource::class;
}
