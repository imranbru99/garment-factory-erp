<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CurrencyResource\Pages;

use App\Filament\Admin\Resources\CurrencyResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCurrency extends CreatesGarmentRecord
{
    protected static string $resource = CurrencyResource::class;
}
