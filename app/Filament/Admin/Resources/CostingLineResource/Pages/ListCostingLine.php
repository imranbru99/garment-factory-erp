<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CostingLineResource\Pages;

use App\Filament\Admin\Resources\CostingLineResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCostingLine extends ListsGarmentRecords
{
    protected static string $resource = CostingLineResource::class;
}
