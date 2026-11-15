<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\GrievanceResource\Pages;

use App\Filament\Admin\Resources\GrievanceResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateGrievance extends CreatesGarmentRecord
{
    protected static string $resource = GrievanceResource::class;
}
