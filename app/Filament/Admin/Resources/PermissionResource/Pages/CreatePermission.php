<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PermissionResource\Pages;

use App\Filament\Admin\Resources\PermissionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePermission extends CreatesGarmentRecord
{
    protected static string $resource = PermissionResource::class;
}
