<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\SupplierInvoiceResource\Pages;

use App\Filament\Supplier\Resources\SupplierInvoiceResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSupplierInvoice extends ListsGarmentRecords
{
    protected static string $resource = SupplierInvoiceResource::class;
}
