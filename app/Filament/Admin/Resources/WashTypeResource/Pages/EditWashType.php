<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\WashTypeResource\Pages;

use App\Filament\Admin\Resources\WashTypeResource;
use App\Filament\Support\EditsGarmentRecord;

class EditWashType extends EditsGarmentRecord
{
    protected static string $resource = WashTypeResource::class;
}
