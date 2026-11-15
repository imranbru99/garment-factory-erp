<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\QcInspectionResource\Pages;

use App\Filament\Admin\Resources\QcInspectionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditQcInspection extends EditsGarmentRecord
{
    protected static string $resource = QcInspectionResource::class;
}
