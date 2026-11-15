<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GoodsReceiptResource\Pages;

use App\Filament\Admin\Resources\GoodsReceiptResource;
use App\Filament\Support\EditsGarmentRecord;

class EditGoodsReceipt extends EditsGarmentRecord
{
    protected static string $resource = GoodsReceiptResource::class;
}
