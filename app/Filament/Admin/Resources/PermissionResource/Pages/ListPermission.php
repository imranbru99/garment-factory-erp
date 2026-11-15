<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PermissionResource\Pages;

use App\Filament\Admin\Resources\PermissionResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPermission extends ListsGarmentRecords
{
    protected static string $resource = PermissionResource::class;
}
