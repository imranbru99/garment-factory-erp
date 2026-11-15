<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockTransferResource\Pages;

use App\Filament\Admin\Resources\StockTransferResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStockTransfer extends EditsGarmentRecord
{
    protected static string $resource = StockTransferResource::class;
}
