<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SubcontractorResource\Pages;

use App\Filament\Admin\Resources\SubcontractorResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSubcontractor extends ListsGarmentRecords
{
    protected static string $resource = SubcontractorResource::class;
}
