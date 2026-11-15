<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierReturnResource\Pages;

use App\Filament\Admin\Resources\SupplierReturnResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSupplierReturn extends ListsGarmentRecords
{
    protected static string $resource = SupplierReturnResource::class;
}
