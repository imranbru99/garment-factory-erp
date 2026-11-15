<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LayResource\Pages;

use App\Filament\Admin\Resources\LayResource;
use App\Filament\Support\EditsGarmentRecord;

class EditLay extends EditsGarmentRecord
{
    protected static string $resource = LayResource::class;
}
