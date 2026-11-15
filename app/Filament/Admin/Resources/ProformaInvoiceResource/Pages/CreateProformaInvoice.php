<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ProformaInvoiceResource\Pages;

use App\Filament\Admin\Resources\ProformaInvoiceResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateProformaInvoice extends CreatesGarmentRecord
{
    protected static string $resource = ProformaInvoiceResource::class;
}
