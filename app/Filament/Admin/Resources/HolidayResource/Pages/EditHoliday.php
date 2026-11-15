<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\HolidayResource\Pages;

use App\Filament\Admin\Resources\HolidayResource;
use App\Filament\Support\EditsGarmentRecord;

class EditHoliday extends EditsGarmentRecord
{
    protected static string $resource = HolidayResource::class;
}
