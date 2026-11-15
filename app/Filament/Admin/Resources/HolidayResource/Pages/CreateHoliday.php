<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HolidayResource\Pages;

use App\Filament\Admin\Resources\HolidayResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateHoliday extends CreatesGarmentRecord
{
    protected static string $resource = HolidayResource::class;
}
