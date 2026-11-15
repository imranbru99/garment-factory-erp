<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources\GrievanceResource\Pages;

use App\Filament\Employee\Resources\GrievanceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditGrievance extends EditsGarmentRecord
{
    protected static string $resource = GrievanceResource::class;
}
