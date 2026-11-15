<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GoodsReceiptLineResource\Pages;

use App\Filament\Admin\Resources\GoodsReceiptLineResource;
use App\Filament\Support\EditsGarmentRecord;

class EditGoodsReceiptLine extends EditsGarmentRecord
{
    protected static string $resource = GoodsReceiptLineResource::class;
}
