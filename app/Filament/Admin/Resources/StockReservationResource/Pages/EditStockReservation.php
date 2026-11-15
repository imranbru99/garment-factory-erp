<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StockReservationResource\Pages;

use App\Filament\Admin\Resources\StockReservationResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStockReservation extends EditsGarmentRecord
{
    protected static string $resource = StockReservationResource::class;
}
