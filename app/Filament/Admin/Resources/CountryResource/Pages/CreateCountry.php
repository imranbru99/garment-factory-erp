<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CountryResource\Pages;

use App\Filament\Admin\Resources\CountryResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCountry extends CreatesGarmentRecord
{
    protected static string $resource = CountryResource::class;
}
