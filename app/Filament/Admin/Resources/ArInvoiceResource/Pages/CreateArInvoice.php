<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ArInvoiceResource\Pages;

use App\Filament\Admin\Resources\ArInvoiceResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateArInvoice extends CreatesGarmentRecord
{
    protected static string $resource = ArInvoiceResource::class;
}
