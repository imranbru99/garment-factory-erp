<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OrderLineResource\Pages;

use App\Filament\Admin\Resources\OrderLineResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateOrderLine extends CreatesGarmentRecord
{
    protected static string $resource = OrderLineResource::class;
}
