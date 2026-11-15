<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DefectResource\Pages;

use App\Filament\Admin\Resources\DefectResource;
use App\Filament\Support\ListsGarmentRecords;

class ListDefect extends ListsGarmentRecords
{
    protected static string $resource = DefectResource::class;
}
