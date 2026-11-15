<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CaseStudyResource\Pages;

use App\Filament\Admin\Resources\CaseStudyResource;
use App\Filament\Support\ListsGarmentRecords;

class ListCaseStudy extends ListsGarmentRecords
{
    protected static string $resource = CaseStudyResource::class;
}
