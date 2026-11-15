<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockLayerResource\Pages;

use App\Filament\Admin\Resources\StockLayerResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateStockLayer extends CreatesGarmentRecord
{
    protected static string $resource = StockLayerResource::class;
}
