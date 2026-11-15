<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\CaseStudyResource\Pages;

use App\Filament\Admin\Resources\CaseStudyResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateCaseStudy extends CreatesGarmentRecord
{
    protected static string $resource = CaseStudyResource::class;
}
