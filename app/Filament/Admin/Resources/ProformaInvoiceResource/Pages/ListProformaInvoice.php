<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ProformaInvoiceResource\Pages;

use App\Filament\Admin\Resources\ProformaInvoiceResource;
use App\Filament\Support\ListsGarmentRecords;

class ListProformaInvoice extends ListsGarmentRecords
{
    protected static string $resource = ProformaInvoiceResource::class;
}
