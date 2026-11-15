<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ExchangeRateResource\Pages;

use App\Filament\Admin\Resources\ExchangeRateResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateExchangeRate extends CreatesGarmentRecord
{
    protected static string $resource = ExchangeRateResource::class;
}
