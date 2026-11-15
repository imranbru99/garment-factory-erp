<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierInvoiceResource\Pages;

use App\Filament\Admin\Resources\SupplierInvoiceResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSupplierInvoice extends CreatesGarmentRecord
{
    protected static string $resource = SupplierInvoiceResource::class;
}
