<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CommercialInvoiceResource\Pages;

use App\Filament\Admin\Resources\CommercialInvoiceResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCommercialInvoice extends ListsGarmentRecords
{
    protected static string $resource = CommercialInvoiceResource::class;
}
