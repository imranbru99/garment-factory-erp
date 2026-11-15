<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ExchangeRateResource\Pages;

use App\Filament\Admin\Resources\ExchangeRateResource;
use App\Filament\Support\ListsGarmentRecords;

class ListExchangeRate extends ListsGarmentRecords
{
    protected static string $resource = ExchangeRateResource::class;
}
