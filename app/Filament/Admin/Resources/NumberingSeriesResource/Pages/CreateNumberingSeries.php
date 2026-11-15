<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\NumberingSeriesResource\Pages;

use App\Filament\Admin\Resources\NumberingSeriesResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateNumberingSeries extends CreatesGarmentRecord
{
    protected static string $resource = NumberingSeriesResource::class;
}
