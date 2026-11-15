<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\GoodsReceiptResource\Pages;

use App\Filament\Floor\Resources\GoodsReceiptResource;
use App\Filament\Support\ListsGarmentRecords;

class ListGoodsReceipt extends ListsGarmentRecords
{
    protected static string $resource = GoodsReceiptResource::class;
}
