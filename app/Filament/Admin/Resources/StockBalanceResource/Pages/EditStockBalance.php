<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockBalanceResource\Pages;

use App\Filament\Admin\Resources\StockBalanceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStockBalance extends EditsGarmentRecord
{
    protected static string $resource = StockBalanceResource::class;
}
