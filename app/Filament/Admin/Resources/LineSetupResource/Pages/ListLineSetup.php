<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LineSetupResource\Pages;

use App\Filament\Admin\Resources\LineSetupResource;
use App\Filament\Support\ListsGarmentRecords;

class ListLineSetup extends ListsGarmentRecords
{
    protected static string $resource = LineSetupResource::class;
}
