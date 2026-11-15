<?php

declare(strict_types=1);

namespace App\Filament\Supplier\Resources\SupplierInvoiceResource\Pages;

use App\Filament\Supplier\Resources\SupplierInvoiceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditSupplierInvoice extends EditsGarmentRecord
{
    protected static string $resource = SupplierInvoiceResource::class;
}
