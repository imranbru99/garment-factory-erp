<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources\ShipmentResource\Pages;

use App\Filament\Buyer\Resources\ShipmentResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateShipment extends CreatesGarmentRecord
{
    protected static string $resource = ShipmentResource::class;
}
