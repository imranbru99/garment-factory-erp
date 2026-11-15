<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ShipmentResource\Pages;

use App\Filament\Admin\Resources\ShipmentResource;
use App\Filament\Support\EditsGarmentRecord;

class EditShipment extends EditsGarmentRecord
{
    protected static string $resource = ShipmentResource::class;
}
