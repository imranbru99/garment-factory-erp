<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockTransferResource\Pages;

use App\Filament\Admin\Resources\StockTransferResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateStockTransfer extends CreatesGarmentRecord
{
    protected static string $resource = StockTransferResource::class;
}
