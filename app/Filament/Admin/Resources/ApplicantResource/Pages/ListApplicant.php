<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\ApplicantResource\Pages;

use App\Filament\Admin\Resources\ApplicantResource;
use App\Filament\Support\ListsGarmentRecords;

class ListApplicant extends ListsGarmentRecords
{
    protected static string $resource = ApplicantResource::class;
}
