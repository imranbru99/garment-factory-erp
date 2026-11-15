<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PlaybookResource\Pages;

use App\Filament\Admin\Resources\PlaybookResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePlaybook extends CreatesGarmentRecord
{
    protected static string $resource = PlaybookResource::class;
}
