<?php

declare(strict_types=1);

namespace App\Filament\Buyer\Resources\QcInspectionResource\Pages;

use App\Filament\Buyer\Resources\QcInspectionResource;
use App\Filament\Support\EditsGarmentRecord;

class EditQcInspection extends EditsGarmentRecord
{
    protected static string $resource = QcInspectionResource::class;
}
