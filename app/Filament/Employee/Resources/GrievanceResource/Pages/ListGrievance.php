<?php

declare(strict_types=1);

namespace App\Filament\Employee\Resources\GrievanceResource\Pages;

use App\Filament\Employee\Resources\GrievanceResource;
use App\Filament\Support\ListsGarmentRecords;

class ListGrievance extends ListsGarmentRecords
{
    protected static string $resource = GrievanceResource::class;
}
