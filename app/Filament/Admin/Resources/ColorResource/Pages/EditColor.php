<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ColorResource\Pages;

use App\Filament\Admin\Resources\ColorResource;
use App\Filament\Support\EditsGarmentRecord;

class EditColor extends EditsGarmentRecord
{
    protected static string $resource = ColorResource::class;
}
