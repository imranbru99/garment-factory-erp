<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SafetyCheckResource\Pages;

use App\Filament\Admin\Resources\SafetyCheckResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSafetyCheck extends ListsGarmentRecords
{
    protected static string $resource = SafetyCheckResource::class;
}
