<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ExchangeRateResource\Pages;

use App\Filament\Admin\Resources\ExchangeRateResource;
use App\Filament\Support\EditsGarmentRecord;

class EditExchangeRate extends EditsGarmentRecord
{
    protected static string $resource = ExchangeRateResource::class;
}
