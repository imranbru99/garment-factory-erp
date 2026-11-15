<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockLayerResource\Pages;

use App\Filament\Admin\Resources\StockLayerResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStockLayer extends EditsGarmentRecord
{
    protected static string $resource = StockLayerResource::class;
}
