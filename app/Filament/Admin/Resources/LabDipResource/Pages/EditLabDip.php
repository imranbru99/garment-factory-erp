<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LabDipResource\Pages;

use App\Filament\Admin\Resources\LabDipResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLabDip extends EditsGarmentRecord
{
    protected static string $resource = LabDipResource::class;
}
