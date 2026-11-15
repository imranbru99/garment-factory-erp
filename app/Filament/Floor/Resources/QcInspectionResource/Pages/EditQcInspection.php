<?php

declare(strict_types=1);

namespace App\Filament\Floor\Resources\QcInspectionResource\Pages;

use App\Filament\Floor\Resources\QcInspectionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditQcInspection extends EditsGarmentRecord
{
    protected static string $resource = QcInspectionResource::class;
}
