<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DepartmentResource\Pages;

use App\Filament\Admin\Resources\DepartmentResource;
use App\Filament\Support\ListsGarmentRecords;

class ListDepartment extends ListsGarmentRecords
{
    protected static string $resource = DepartmentResource::class;
}
