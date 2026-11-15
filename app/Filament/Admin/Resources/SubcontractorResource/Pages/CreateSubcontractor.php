<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\SubcontractorResource\Pages;

use App\Filament\Admin\Resources\SubcontractorResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateSubcontractor extends CreatesGarmentRecord
{
    protected static string $resource = SubcontractorResource::class;
}
