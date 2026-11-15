<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CostingResource\Pages;

use App\Filament\Admin\Resources\CostingResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCosting extends ListsGarmentRecords
{
    protected static string $resource = CostingResource::class;
}
