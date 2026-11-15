<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EmployeeResource\Pages;

use App\Filament\Admin\Resources\EmployeeResource;
use App\Filament\Support\ListsGarmentRecords;

class ListEmployee extends ListsGarmentRecords
{
    protected static string $resource = EmployeeResource::class;
}
