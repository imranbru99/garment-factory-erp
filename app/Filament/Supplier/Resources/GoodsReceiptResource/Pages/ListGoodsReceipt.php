<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\GoodsReceiptResource\Pages;

use App\Filament\Supplier\Resources\GoodsReceiptResource;
use App\Filament\Support\ListsGarmentRecords;

class ListGoodsReceipt extends ListsGarmentRecords
{
    protected static string $resource = GoodsReceiptResource::class;
}
