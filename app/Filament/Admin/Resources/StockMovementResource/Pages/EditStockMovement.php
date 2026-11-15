<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockMovementResource\Pages;

use App\Filament\Admin\Resources\StockMovementResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStockMovement extends EditsGarmentRecord
{
    protected static string $resource = StockMovementResource::class;
}
