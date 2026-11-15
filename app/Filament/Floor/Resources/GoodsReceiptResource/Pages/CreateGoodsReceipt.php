<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\GoodsReceiptResource\Pages;

use App\Filament\Floor\Resources\GoodsReceiptResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateGoodsReceipt extends CreatesGarmentRecord
{
    protected static string $resource = GoodsReceiptResource::class;
}
