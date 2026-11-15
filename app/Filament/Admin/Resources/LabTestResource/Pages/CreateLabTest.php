<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\LabTestResource\Pages;

use App\Filament\Admin\Resources\LabTestResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateLabTest extends CreatesGarmentRecord
{
    protected static string $resource = LabTestResource::class;
}
