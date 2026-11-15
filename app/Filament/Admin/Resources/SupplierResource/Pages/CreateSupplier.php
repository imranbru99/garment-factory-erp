<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierResource\Pages;

use App\Filament\Admin\Resources\SupplierResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSupplier extends CreatesGarmentRecord
{
    protected static string $resource = SupplierResource::class;
}
