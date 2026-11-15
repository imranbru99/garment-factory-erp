<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HolidayResource\Pages;

use App\Filament\Admin\Resources\HolidayResource;
use App\Filament\Support\ListsGarmentRecords;

class ListHoliday extends ListsGarmentRecords
{
    protected static string $resource = HolidayResource::class;
}
