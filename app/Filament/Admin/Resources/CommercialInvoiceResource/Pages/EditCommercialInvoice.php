<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CommercialInvoiceResource\Pages;

use App\Filament\Admin\Resources\CommercialInvoiceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCommercialInvoice extends EditsGarmentRecord
{
    protected static string $resource = CommercialInvoiceResource::class;
}
