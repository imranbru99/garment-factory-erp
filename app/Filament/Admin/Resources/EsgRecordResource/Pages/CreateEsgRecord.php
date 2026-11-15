<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\EsgRecordResource\Pages;

use App\Filament\Admin\Resources\EsgRecordResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreateEsgRecord extends CreatesGarmentRecord
{
    protected static string $resource = EsgRecordResource::class;
}
