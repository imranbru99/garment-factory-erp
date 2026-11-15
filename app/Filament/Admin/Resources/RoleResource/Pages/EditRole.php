<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RoleResource\Pages;

use App\Filament\Admin\Resources\RoleResource;
use App\Filament\Support\EditsGarmentRecord;

class EditRole extends EditsGarmentRecord
{
    protected static string $resource = RoleResource::class;
}
