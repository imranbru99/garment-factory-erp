<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\BomResource\Pages;

use App\Filament\Admin\Resources\BomResource;
use App\Filament\Support\EditsGarmentRecord;

class EditBom extends EditsGarmentRecord
{
    protected static string $resource = BomResource::class;
}
