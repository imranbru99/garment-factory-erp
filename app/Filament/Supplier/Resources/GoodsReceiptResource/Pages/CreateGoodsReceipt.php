<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\GoodsReceiptResource\Pages;

use App\Filament\Supplier\Resources\GoodsReceiptResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateGoodsReceipt extends CreatesGarmentRecord
{
    protected static string $resource = GoodsReceiptResource::class;
}
