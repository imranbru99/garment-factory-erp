<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NumberingCounterResource\Pages;

use App\Filament\Admin\Resources\NumberingCounterResource;
use App\Filament\Support\ListsGarmentRecords;

class ListNumberingCounter extends ListsGarmentRecords
{
    protected static string $resource = NumberingCounterResource::class;
}
