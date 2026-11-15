<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\CartonResource\Pages;

use App\Filament\Floor\Resources\CartonResource;
use App\Filament\Support\EditsGarmentRecord;

class EditCarton extends EditsGarmentRecord
{
    protected static string $resource = CartonResource::class;
}
