<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\IncotermResource\Pages;

use App\Filament\Admin\Resources\IncotermResource;
use App\Filament\Support\EditsGarmentRecord;

class EditIncoterm extends EditsGarmentRecord
{
    protected static string $resource = IncotermResource::class;
}
