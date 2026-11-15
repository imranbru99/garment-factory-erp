<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\PurchaseOrderResource\Pages;

use App\Filament\Supplier\Resources\PurchaseOrderResource;
use App\Filament\Support\EditsGarmentRecord;

class EditPurchaseOrder extends EditsGarmentRecord
{
    protected static string $resource = PurchaseOrderResource::class;
}
