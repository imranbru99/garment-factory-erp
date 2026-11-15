<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\PlaybookStepResource\Pages;

use App\Filament\Admin\Resources\PlaybookStepResource;
use App\Filament\Support\CreatesGarmentRecord;

class CreatePlaybookStep extends CreatesGarmentRecord
{
    protected static string $resource = PlaybookStepResource::class;
}
