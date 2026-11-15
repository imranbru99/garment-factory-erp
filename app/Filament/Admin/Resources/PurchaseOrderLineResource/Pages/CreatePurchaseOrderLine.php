<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PurchaseOrderLineResource\Pages;

use App\Filament\Admin\Resources\PurchaseOrderLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePurchaseOrderLine extends CreatesGarmentRecord
{
    protected static string $resource = PurchaseOrderLineResource::class;
}
