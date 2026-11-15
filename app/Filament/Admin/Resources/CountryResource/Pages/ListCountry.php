<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CountryResource\Pages;

use App\Filament\Admin\Resources\CountryResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCountry extends ListsGarmentRecords
{
    protected static string $resource = CountryResource::class;
}
