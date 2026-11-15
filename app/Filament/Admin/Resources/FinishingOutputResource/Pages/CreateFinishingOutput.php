<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\FinishingOutputResource\Pages;

use App\Filament\Admin\Resources\FinishingOutputResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateFinishingOutput extends CreatesGarmentRecord
{
    protected static string $resource = FinishingOutputResource::class;
}
