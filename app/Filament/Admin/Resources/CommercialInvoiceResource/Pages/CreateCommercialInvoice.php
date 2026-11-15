<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CommercialInvoiceResource\Pages;

use App\Filament\Admin\Resources\CommercialInvoiceResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCommercialInvoice extends CreatesGarmentRecord
{
    protected static string $resource = CommercialInvoiceResource::class;
}
