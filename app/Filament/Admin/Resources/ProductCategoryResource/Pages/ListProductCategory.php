<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ProductCategoryResource\Pages;

use App\Filament\Admin\Resources\ProductCategoryResource;
use App\Filament\Support\ListsGarmentRecords;

class ListProductCategory extends ListsGarmentRecords
{
    protected static string $resource = ProductCategoryResource::class;
}
