<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\OrderRevisionResource\Pages;

use App\Filament\Admin\Resources\OrderRevisionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateOrderRevision extends CreatesGarmentRecord
{
    protected static string $resource = OrderRevisionResource::class;
}
