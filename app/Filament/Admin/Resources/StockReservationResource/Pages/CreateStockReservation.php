<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockReservationResource\Pages;

use App\Filament\Admin\Resources\StockReservationResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateStockReservation extends CreatesGarmentRecord
{
    protected static string $resource = StockReservationResource::class;
}
