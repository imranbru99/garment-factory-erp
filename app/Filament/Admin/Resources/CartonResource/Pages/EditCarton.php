<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CartonResource\Pages;

use App\Filament\Admin\Resources\CartonResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCarton extends EditsGarmentRecord
{
    protected static string $resource = CartonResource::class;
}
