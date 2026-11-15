<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QuotationResource\Pages;

use App\Filament\Admin\Resources\QuotationResource;
use App\Filament\Support\ListsGarmentRecords;

class ListQuotation extends ListsGarmentRecords
{
    protected static string $resource = QuotationResource::class;
}
