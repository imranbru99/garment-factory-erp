<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DepartmentResource\Pages;

use App\Filament\Admin\Resources\DepartmentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateDepartment extends CreatesGarmentRecord
{
    protected static string $resource = DepartmentResource::class;
}
