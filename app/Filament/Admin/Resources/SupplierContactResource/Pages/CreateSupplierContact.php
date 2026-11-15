<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierContactResource\Pages;

use App\Filament\Admin\Resources\SupplierContactResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSupplierContact extends CreatesGarmentRecord
{
    protected static string $resource = SupplierContactResource::class;
}
