<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierResource\Pages;

use App\Filament\Admin\Resources\SupplierResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSupplier extends ListsGarmentRecords
{
    protected static string $resource = SupplierResource::class;
}
