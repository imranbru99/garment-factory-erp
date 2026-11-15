<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EmbroideryTypeResource\Pages;

use App\Filament\Admin\Resources\EmbroideryTypeResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateEmbroideryType extends CreatesGarmentRecord
{
    protected static string $resource = EmbroideryTypeResource::class;
}
