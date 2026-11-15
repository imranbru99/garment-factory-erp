<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SupplierContactResource\Pages;

use App\Filament\Admin\Resources\SupplierContactResource;
use App\Filament\Support\ListsGarmentRecords;

class ListSupplierContact extends ListsGarmentRecords
{
    protected static string $resource = SupplierContactResource::class;
}
