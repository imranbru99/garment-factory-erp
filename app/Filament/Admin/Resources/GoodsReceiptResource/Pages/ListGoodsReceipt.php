<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GoodsReceiptResource\Pages;

use App\Filament\Admin\Resources\GoodsReceiptResource;
use App\Filament\Support\ListsGarmentRecords;

class ListGoodsReceipt extends ListsGarmentRecords
{
    protected static string $resource = GoodsReceiptResource::class;
}
