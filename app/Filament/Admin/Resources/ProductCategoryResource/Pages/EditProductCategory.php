<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ProductCategoryResource\Pages;

use App\Filament\Admin\Resources\ProductCategoryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditProductCategory extends EditsGarmentRecord
{
    protected static string $resource = ProductCategoryResource::class;
}
