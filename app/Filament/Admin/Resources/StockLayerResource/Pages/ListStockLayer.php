<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockLayerResource\Pages;

use App\Filament\Admin\Resources\StockLayerResource;
use App\Filament\Support\ListsGarmentRecords;

class ListStockLayer extends ListsGarmentRecords
{
    protected static string $resource = StockLayerResource::class;
}
