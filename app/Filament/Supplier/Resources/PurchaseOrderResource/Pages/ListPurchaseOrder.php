<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\PurchaseOrderResource\Pages;

use App\Filament\Supplier\Resources\PurchaseOrderResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPurchaseOrder extends ListsGarmentRecords
{
    protected static string $resource = PurchaseOrderResource::class;
}
