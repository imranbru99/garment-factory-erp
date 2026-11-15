<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\RfqQuoteResource\Pages;

use App\Filament\Admin\Resources\RfqQuoteResource;
use App\Filament\Support\ListsGarmentRecords;

class ListRfqQuote extends ListsGarmentRecords
{
    protected static string $resource = RfqQuoteResource::class;
}
