<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DesignationResource\Pages;

use App\Filament\Admin\Resources\DesignationResource;
use App\Filament\Support\ListsGarmentRecords;

class ListDesignation extends ListsGarmentRecords
{
    protected static string $resource = DesignationResource::class;
}
