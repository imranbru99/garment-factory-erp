<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\StoreResource\Pages;

use App\Filament\Admin\Resources\StoreResource;
use App\Filament\Support\EditsGarmentRecord;

class EditStore extends EditsGarmentRecord
{
    protected static string $resource = StoreResource::class;
}
