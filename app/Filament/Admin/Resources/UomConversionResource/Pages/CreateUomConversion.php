<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\UomConversionResource\Pages;

use App\Filament\Admin\Resources\UomConversionResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateUomConversion extends CreatesGarmentRecord
{
    protected static string $resource = UomConversionResource::class;
}
