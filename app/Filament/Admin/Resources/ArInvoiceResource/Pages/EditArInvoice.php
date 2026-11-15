<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ArInvoiceResource\Pages;

use App\Filament\Admin\Resources\ArInvoiceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditArInvoice extends EditsGarmentRecord
{
    protected static string $resource = ArInvoiceResource::class;
}
