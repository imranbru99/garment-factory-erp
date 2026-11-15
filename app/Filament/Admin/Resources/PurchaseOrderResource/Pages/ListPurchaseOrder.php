<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PurchaseOrderResource\Pages;

use App\Filament\Admin\Resources\PurchaseOrderResource;
use App\Filament\Support\ListsGarmentRecords;

class ListPurchaseOrder extends ListsGarmentRecords
{
    protected static string $resource = PurchaseOrderResource::class;
}
