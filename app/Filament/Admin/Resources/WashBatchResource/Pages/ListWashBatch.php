<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashBatchResource\Pages;

use App\Filament\Admin\Resources\WashBatchResource;
use App\Filament\Support\ListsGarmentRecords;

class ListWashBatch extends ListsGarmentRecords
{
    protected static string $resource = WashBatchResource::class;
}
