<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GrievanceResource\Pages;

use App\Filament\Admin\Resources\GrievanceResource;
use App\Filament\Support\EditsGarmentRecord;

class EditGrievance extends EditsGarmentRecord
{
    protected static string $resource = GrievanceResource::class;
}
