<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CountryResource\Pages;

use App\Filament\Admin\Resources\CountryResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCountry extends EditsGarmentRecord
{
    protected static string $resource = CountryResource::class;
}
