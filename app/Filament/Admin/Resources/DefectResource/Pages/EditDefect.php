<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\DefectResource\Pages;

use App\Filament\Admin\Resources\DefectResource;
use App\Filament\Support\EditsGarmentRecord;

class EditDefect extends EditsGarmentRecord
{
    protected static string $resource = DefectResource::class;
}
