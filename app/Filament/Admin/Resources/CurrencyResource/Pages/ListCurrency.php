<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CurrencyResource\Pages;

use App\Filament\Admin\Resources\CurrencyResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCurrency extends ListsGarmentRecords
{
    protected static string $resource = CurrencyResource::class;
}
