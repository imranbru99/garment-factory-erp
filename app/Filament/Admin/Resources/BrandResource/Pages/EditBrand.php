<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BrandResource\Pages;

use App\Filament\Admin\Resources\BrandResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBrand extends EditsGarmentRecord
{
    protected static string $resource = BrandResource::class;
}
